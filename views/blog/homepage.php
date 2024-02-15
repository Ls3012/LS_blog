    <title>Ma Page</title>
    <style>
        h1, h2 {
            text-align: center;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 5%px;
        }

        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10%;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .content {
            display: flex;
            width: 100%;
            justify-content: space-between;
        }

        img {
            max-width: 35%;
            height: auto;
            margin-right: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            text-align: justify;
            width: 60%; /* La description occupe 60% de la largeur de l'écran */
            margin-top: 0; /* Réduire l'espace supérieur de la description */
        }
    </style>
</head>
<body>

    <h1>Grand Titre</h1>
    <h2>Titre Plus Petit</h2>

    <div class="container">
        <div class="content">
            <img src="public/image/image1.avif" alt="Description de l'image">
            <p>
                Description sur plusieurs lignes. Description sur plusieurs lignes.
                Description sur plusieurs lignes. Description sur plusieurs lignes.
                Description sur plusieurs lignes.
            </p>
        </div>
    </div>

