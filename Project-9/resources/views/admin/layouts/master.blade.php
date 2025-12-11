<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AlatAgri</title>
    <link rel="stylesheet" href="../css/dashboard-styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .image-upload-wrapper {
            display: flex;
            align-items: flex-start;
            gap: 25px;
            margin-top: 8px;
        }

        .upload-box {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .upload-btn {
            background: #4c7cff;
            color: white;
            padding: 10px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .upload-btn:hover {
            background: #3b67d8;
        }

        .input-gambar {
            display: none;
        }

        .file-name {
            font-size: 13px;
            color: #555;
            font-style: italic;
            max-width: 180px;
            word-break: break-all;
        }

        .preview-box {
            width: 140px;
            height: 140px;
            border: 2px dashed #bbb;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fafafa;
            overflow: hidden;
        }

        .preview-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #logout-btn {
            display: flex;
            align-items: center;
            justify-content: left;
            margin: 0px;
            gap: 0px;
            font-weight: 600
        }

        #logout-btn button {
            width: 300px;
            background: none;
            border: none;
            color: inherit;
            font: inherit;
            cursor: pointer;
            padding: 18px;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 15px;
            border-radius: 10px;
        }

        #logout-btn button:hover {
            background-color: #ffffff;
        }

        .btn-download {
            padding: 8px 15px;
            background-color: #2d6a4f;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 10px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1 class="title">AlatAgri</h1>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}"><i class="fas fa-th-large"></i> Dashboard</a>
                    </li>

                    <li class="{{ Route::is('report') ? 'active' : '' }}">
                        <a href="{{ route('report') }}"><i class="fas fa-chart-bar"></i> Laporan</a>
                    </li>

                    <li class="{{ Route::is('shop') ? 'active' : '' }}">
                        <a href="{{ route('shop') }}"><i class="fas fa-store"></i> Kelola Toko</a>
                    </li>

                    <li class="{{ Route::is('categories') ? 'active' : '' }}">
                        <a href="{{ route('categories') }}"><i class="fas fa-tags"></i> Kategori Produk</a>
                    </li>

                    <li class="{{ Route::is('products') ? 'active' : '' }}">
                        <a href="{{ route('products') }}"><i class="fas fa-box"></i> Kelola Produk</a>
                    </li>

                    <li>
                        <form action="{{ route('logout') }}" id="logout-btn" class="btn-logout">
                            <button type="submit" form="logout-btn">
                                <i class="fas fa-sign-out-alt"></i>
                                Log out
                            </button>
                        </form>
                    </li>

                </ul>
            </nav>
        </aside>
        <main class="main-content">
            @yield('content')
        </main>
    </div>

    @include('admin.layouts.script')
</body>

</html>
