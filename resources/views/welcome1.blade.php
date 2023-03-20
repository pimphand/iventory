</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>QR Code Generator</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
    integrity="sha384-L5Q+oBj5RvGz9hPJoIZPR3zTr3c+vKpASw42nI/y+TlTJvGnZlNywr1IG+j+9XsJ" crossorigin="anonymous" />
</head>

<body>
  <div class="container py-5">
    <h1 class="mb-4">QR Code Generator</h1>
    <div class="row mb-3">
      <div class="col-md-6">
        <form>
          <div class="mb-3">
            <label for="text-input" class="form-label">Text to encode:</label>
            <input type="text" id="text-input" name="text-input" class="form-control" />
          </div>
          <button type="button" class="btn btn-primary" onclick="generateQR()">Generate QR Code</button>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-4">
        <div id="reader" width="400" height="300"></div>
      </div>
      <div class="col-4">
        <h1 class="mb-4" id="scan-result">QR Code Generator</h1>
        <h1 class="mb-4" id="count">QR Code Generator</h1>
        {{-- <h1>QR Code Generator</h1>

        <p>Product Name: {{ $data['product']['name'] }}</p>
        <p>Product Price: {{ $data['product']['price'] }}</p>
        <p>Product Description: {{ $data['product']['description'] }}</p>

        <img src="data:image/png;base64,{{ $data['qrCode'] }}" alt="QR Code">
        {!! QrCode::format('svg')->size(300)->mergeString(asset('laravel.png'),
        .3)->generate(json_encode($data['product'])); !!} --}}
      </div>
    </div>
  </div>
  <!-- Bootstrap JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-8jKbVPzeh+TmPDlHDTi9T3q1jNG/qa/M7V1nE6U8iVUetVKseGQCWTNdcAa6Zn7V" crossorigin="anonymous">
  </script>
  <script src="https://unpkg.com/html5-qrcode" type="text/javascript">
  </script>
  <script>
    $(document).ready(function() {
      function onScanSuccess(decodedText, decodedResult) {
          // handle the scanned code as you like, for example:
          console.log(`Code matched = ${decodedText}`, decodedResult);
          let data = `<p>${decodedText}</p> <br>`
          $("#scan-result").append(data);
        }

        function onScanFailure(error) {
          // handle scan failure, usually better to ignore and keep scanning.
          // for example:
          console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
          "reader",
          { fps: 10, qrbox: {width: 250, height: 250} },
          /* verbose= */ false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    });
  </script>
</body>

</html>