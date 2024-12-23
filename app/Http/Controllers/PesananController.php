<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePesananRequest;
use App\Http\Requests\UpdatePesananRequest;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class PesananController extends Controller
{
    // Show the pesanan form
    public function index()
    {
        $pesananData = Pesanan::all();
        return view('pesanan.index', ['pesananData' => $pesananData]);
    }

    public function create() {
        return view('pesanan.create');
    }

    public function show() {
        //
    }

    public function store(StorePesananRequest $request)
    {
        $harga = Pesanan::calculateHarga($request->jenis, $request->jumlahParfum);

        Pesanan::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'jumlahParfum' => $request->jumlahParfum,
            'harga' => $harga,
        ]);

        // Store the data in the session
        session()->put('nama', $request->nama);
        session()->put('jenis', $request->jenis);
        session()->put('jumlahParfum', $request->jumlahParfum);
        session()->put('harga', $harga);

        // Redirect to the hasil route
        return redirect()->route('pesanan.hasil')->with('success', 'Terima kasih sudah order!');
    }

    public function edit(Pesanan $pesanan) {
        return view('pesanan.edit', ['pesanan' => $pesanan]);
    }

    public function update(UpdatePesananRequest $request, Pesanan $pesanan) {
        $harga = Pesanan::calculateHarga($request->jenis, $request->jumlahParfum);
        $pesanan->update(array_merge($request->validated(), ['harga' => $harga]));
        return redirect(route('pesanan.index'));
    }

    public function destroy(Pesanan $pesanan) {
        $pesanan->delete();
        return redirect(route('pesanan.index'));
    }

    public function hasil()
    {
        // Retrieve the data from the session
        $nama = session('nama');
        $jenis = session('jenis');
        $jumlahParfum = session('jumlahParfum');
        $harga = session('harga');

        // Return the view and pass the data to it
        return view('pesanan.hasil', compact('nama', 'jenis', 'jumlahParfum', 'harga'));
    }

    public function download(Request $request)
    {
        // Generate the PDF
        $nama = $request->input('nama'); // Define the $nama variable
        $jumlahParfum = $request->input('jumlahParfum'); // Define the $nama variable
        $jenis = $request->input('jenis'); // Define the $nama variable
        $harga = $request->input('harga');

        // Set the PDF size to A7

        $v = View::make('pdf.struk', compact('nama', 'harga', 'jenis', 'jumlahParfum'))->render();

        $pdf = new Dompdf();

        $pdf->loadHtml($v);

        $pdf->setPaper('a7', 'portrait');

        $pdf->render();

        $pdf->stream('invoice.pdf', array('Attachment' => 0));

        // Remove the data from the session to avoid showing it again upon page refresh
        session()->forget(['nama', 'jenis', 'jumlahParfum', 'harga']);

        // Download the PDF to the user's browser
        // return $pdf->download('struk.pdf');
    }
}
