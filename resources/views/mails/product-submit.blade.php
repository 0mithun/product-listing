<html>

<head>
    <title>Print</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lora:wght@500&display=swap"
        rel="stylesheet">
    <style>
        @page {
            size: auto;
            margin: 0mm;
        }

        /* style sheet for "A4" printing */
        @media print and (width: 21cm) and (height: 29.7cm) {
            @page {
                margin: 3cm;
            }

            body {
                -webkit-print-color-adjust: exact;
                -moz-print-color-adjust: exact;
                -ms-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }

    </style>
</head>

<body style="font-family: 'Inter', sans-serif; padding:11px;">
    <h4 align="center"
        style="font-size: 1.6rem; font-weight: 500; text-transform: capitalize; margin-bottom: 11px; font-family:lora;   margin-top:25px;">
        Hello, {{ $submitted->name }}</h3>

    <h3 align="center"
        style="font-size: 1.6rem; font-weight: 500; text-transform: uppercase; margin-bottom: 11px; font-family:lora; text-decoration:underline; margin-top:25px;">
        <a href="{{ route('slug.view', nestedPathRemoveFirst($category->slug_path).'/'. $product->slug) }}">{{ $product->title }}</a>  </h3>
    <div align="center" style="margin-top:15px;">
        <div>
            @foreach ($product->getMedia('gallery') as $media)
                <table style="display: inline-block;margin:20px;">
                    <tr style="display:none;">
                        <td colspan="3">
                            <img style="height:2px; width:100%;" src="" class="lazyload" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img style="height:2px; width:100%;" src="" class="lazyload" />
                        </td>
                        <td>
                            <div
                                style="background-image:url('{{ asset('img/') }}/bbg.jpg'); padding:1px; display:inline-block; color-adjust: exact; -webkit-print-color-adjust: exact;">
                                <img
                                    src="{{ $media->getFullUrl() }}"
                                    style="width:280px; padding:8px; background-color: #fff; margin: 1px;" />
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr style="display:none;">
                        <td colspan="3">
                            <img style="height:2px; width:100%;" src="" class="lazyload" />
                        </td>

                    </tr>
                </table>
            @endforeach
        </div>

    </div>
    <div style="height: auto;">
        <div style="margin-top:-5px; text-align:justify; padding:25px;  ">
           <h3 style="margin: 0;">Product Description:</h3>
           {!! $product->description !!}
        </div>
        <div style="margin-top:-5px; text-align:justify; padding-left:25px;">
            <p style="margin-top:0px;">
                <b>Dimensions</b> - {{ $product->dimension }}<br />
                <b>Origin</b> - {{ $product->origin }}<br />
                <b>Price</b> - {{ $product->price ? '$' . $product->price : 'Please contact for pricing.' }}<br />
            </p>
        </div>
    </div><br />
    <div align="center" style="margin-top:30px;">
        <img src="{{ $setting->logo_image_url }}" style="max-width:135px; margin-bottom:-8px;" style="" />
    </div>

    <div align="center" style="padding:11px;  font-size:11px; color:#000; line-height: 18px;">
        <b style="display:inline-block;">{{ $setting->name }}</b><br />
        {{ $setting->full_address }}<br />
        {{ $setting->phone }}<br />
        {{ $setting->email }}<br />
        {{ url('/') }}<br />

    </div>
    <script>
        window.print();
    </script>
</body>

</html>
