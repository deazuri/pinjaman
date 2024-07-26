@extends('layout.app')
@section('content')
<div class="content-wrapper" style="min-height: 690.2px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-12">
                    <h1 class="m-0 text-center h2">SPK Metode TOPSIS</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Add your text paragraph here -->
    <div class="content">
        <p class="text-justify">
            Sistem Pendukung Keputusan (SPK) yang mengadopsi metode TOPSIS, atau Technique for Order of Preference by Similarity to Ideal Solution, merupakan suatu sistem yang dirancang untuk memudahkan proses pengambilan keputusan dalam berbagai konteks.

            Dengan menggunakan metode TOPSIS, SPK ini dapat mengatasi tantangan pemilihan alternatif dengan multiple kriteria. Pertama, sistem mengidentifikasi masalah atau keputusan yang perlu diambil, kemudian menentukan kriteria dan alternatif yang relevan. Bobot kriteria ditentukan untuk mencerminkan tingkat kepentingan relatif dari setiap kriteria.

            Matriks keputusan kemudian dinormalisasi untuk menyamakan skala atau satuan ukuran dari kriteria yang berbeda. Dengan menghitung jarak Euclidean atau jarak Minkowski, SPK menentukan solusi ideal positif dan solusi ideal negatif sebagai acuan untuk menilai kedekatan relatif setiap alternatif.

            Alternatif dengan jarak terkecil dari solusi ideal positif dan jarak terjauh dari solusi ideal negatif diberi peringkat tertinggi. Hasil peringkat ini memberikan panduan bagi pengambil keputusan untuk menentukan solusi terbaik. Melalui pendekatan ini, SPK dengan metode TOPSIS memberikan kontribusi signifikan dalam meningkatkan akurasi dan efisiensi dalam proses pengambilan keputusan dengan mempertimbangkan sejumlah kriteria yang beragam.
        </p>
    </div>
</div>
@endsection
