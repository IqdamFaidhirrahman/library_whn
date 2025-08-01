<!-- <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Koleksi;

// class KoleksiController extends Controller
// {
//     public function index(Request $request)
//     {
//         $query = Koleksi::query();

//         // Pencarian (kategori / kode)
//         if ($search = $request->input('search')) {
//             $query->where(function ($q) use ($search) {
//                 $q->where('kategori', 'like', "%{$search}%")
//                     ->orWhere('kode', 'like', "%{$search}%");
//             });
//         }

//         // Filter status opsional
//         if ($status = $request->input('status')) {
//             $query->where('status', $status);
//         }

//         // Pagination
//         $koleksis = $query->orderBy('kategori')
//             ->paginate(10)
//             ->withQueryString();

//         return view('koleksi', [
//             'koleksis' => $koleksis,
//             'search' => $search ?? '',
//             'status' => $status ?? '',
//         ]);
//     }

//     // (Opsional) method show/edit/create bisa ditambahkan nanti
// } -->
