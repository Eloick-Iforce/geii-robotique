<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        color: #333;
    }
    p {
        color: #666;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Votre devis en pièce jointe</h1>
    <p>Bonjour,</p>
    <p>Voici votre devis que vous retrouverez sur cette url</p>
    <a href="{{ $url }}">{{ $url }}</a>
    <p>N'hésitez pas à nous contacter si vous avez des questions ou des préoccupations.</p>
    <p>Merci de votre confiance.</p>
    <br>
</div>
</body>