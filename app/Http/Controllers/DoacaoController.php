<?php

namespace App\Http\Controllers;

use App\Models\Doacao;
use App\Models\Ong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class DoacaoController extends Controller
{
    public function pagamento($id)
    {
        return view('doacao.pagamento');
    }

    public function doacao(Request $request)
    {
        $request->validate([
            'id_doador' => 'required|exists:doadores,id',
            'id_ong' => 'required|exists:ongs,id',
            'valor' => 'required|numeric|min:1'
        ]);

        $ong = Ong::findOrFail($request->id_ong);

        if (!$ong->access_token) {
            return redirect(route('ong.pagamento'))->with('errorMsg', 'Essa ONG não está conectada com o mercado pago :(');
        }

        $response = Http::withToken($ong->access_token)
            ->withHeaders([
                'X-Idempotency-Key' => uniqid(),
            ])
            ->post('https://api.mercadopago.com/v1/payments', [
                'transaction_amount' => (float) $request->valor,
                'description' => "Doação para " . $ong->nome,
                'payment_method_id' => "pix",
                'payer' => ["email" => "emaildoador@email.com"]
            ]);

        $data = $response->json();

        if ($response->successful() && isset($data['status']) && $data['status'] == 'pending') {
            $ticketUrl = $data['point_of_interaction']['transaction_data']['ticket_url'];
            return redirect()->away($ticketUrl);

            $doacao = Doacao::create([
                'id_doador' => $request->id_doador,
                'id_ong' => $request->id_ong,
                'valor' => $request->valor,
                'pix_qr_code' => $data['point_of_interaction']['transaction_data']['qr_code_base64'],
                'status' => 'pendente'
            ]);
            $qrcode = $data['point_of_interaction']['transaction_data']['qr_code_base64'];
            // Decodifica a string Base64 para binário
            $imagemQrCode = base64_decode($qrcode);

            // Retorna a imagem do QR Code no formato PNG
            return Response::make($imagemQrCode, 200, ['Content-Type' => 'image/png']);
        }

        return redirect(route('ong.pagamento'))->with('errorMsg', 'Falha ao gerar pagamento :(');
    }

    public function pagamento_finalizado()
    {
        
    }
}
