<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>ZemraIme - Faqja Kryesore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />         
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
      rel="stylesheet"
    />
    <style> 
      body {
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;
      }
      /* Spacing për të gjithë seksionet */
      section {
        padding: 80px 0;
      }
      /* Navbar styling dhe spacing */
      .navbar-brand {
        font-size: 1.5rem;
        letter-spacing: 1px;
      }
      .navbar-nav .nav-link {
        margin-left: 1rem;
        font-weight: 500;
        text-transform: uppercase;
      }
      /* Hero Section */
      .hero {
        text-align: center;
        background: url("images/background.png") no-repeat center center/cover;
        height: 100vh;
        position: relative;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }
      .hero::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
      }
      .hero > * {
        position: relative;
        z-index: 2;
      }
      .hero img {
        width: 100px;
      }
      .hero h1 {
        font-size: 3rem;
        font-weight: bold;
      }
      .hero p {
        font-size: 1.2rem;
        color: #f1f1f1;
      }
      .btn-start {
        background: #ff4d4d;
        color: white;
        font-weight: bold;
        font-size: 1.1rem;
        padding: 14px 36px;
        border: none;
        border-radius: 10px;
        transition: background 0.3s ease;
      }
      .btn-start:hover {
        background: #e04343;
      }
      .step:hover {
        transform: scale(1.05);
        transition: 0.3s ease;
      }
      .benefit-icon {
        font-size: 2.5rem;
        color: #ff4d4d;
      }
      /* Rreth Nesh styling */
      #rreth-nesh {
        background-color: #ffe5e5;
        border-radius: 12px;
      }
      #rreth-nesh img {
        max-width: 200px;
        border-radius: 50%;
        margin-bottom: 30px;
        border: 4px solid #ff4d4d;
      }
      /* Footer spacing */
      footer {
        padding: 60px 0;
      } 
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand text-danger fw-bold" href="#">❤️ ZemraIme</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto align-items-center">
            <li class="nav-item">
              <a class="nav-link" href="#si-funksionon">Si funksionon</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#rreth-nesh">Rreth nesh</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#perfitimet">Përfitimet</a>
            </li>
           <li class="nav-item">
              <a class="nav-link" href="zemra-kuizi.php">Fakte dhe Këshilla</a>
    </li>
            <li class="nav-item">
              <a class="nav-link" href="#kontakti">Kontakti</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-danger text-white" href="register.php">Regjistrohu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-danger text-white" href="login.php">Kyçu</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
      <img src="images/heart-care.png" alt="Logoja e aplikacionit" />
      <h1>Monitorimi i personalizuar i zemrës</h1>
      <p>
        Platformë gjithëpërfshirëse për të monitoruar mirëqenien tuaj<br />
        <small
          ><i
            >Nuk zëvendëson këshillën mjekësore. Konsultohuni gjithmonë me
            mjekun tuaj.</i
          ></small
        >
      </p>
      <button class="btn btn-start mt-4" href="register.php">NIS UDHËTIMIN TËND</button>
    </section>

    <!-- Si Funksionon -->
    <section class="container" id="si-funksionon">
      <h2 class="text-center mb-4">Si Funksionon</h2>
      <div class="row text-center g-4">
        <div class="col-md-3">
          <div class="p-4 border rounded step">
            <i class="fas fa-user-plus fa-2x text-danger mb-3"></i>
            <h5>1. Regjistrohu</h5>
            <p>
              Krijo llogarinë tënde në aplikacion duke përdorur email-in dhe një
              fjalëkalim të sigurt.
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="p-4 border rounded step">
            <i class="fas fa-mobile-alt fa-2x text-danger mb-3"></i>
            <h5>2. Lidh Pajisjen</h5>
            <p>
              Sinkrono pajisjen tënde të matjes (smartwatch, sensor pulsi) me
              aplikacionin nëpërmjet Bluetooth.
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="p-4 border rounded step">
            <i class="fas fa-heartbeat fa-2x text-danger mb-3"></i>
            <h5>3. Monitoro Kohëreale</h5>
            <p>
              Merr të dhëna të drejtpërdrejta mbi rrahjet e zemrës dhe presionin
              arterial gjatë gjithë ditës.
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="p-4 border rounded step">
            <i class="fas fa-chart-line fa-2x text-danger mb-3"></i>
            <h5>4. Analizo & Ndaj</h5>
            <p>
              Shiko grafikët dhe raportet e gjatëkohore, dhe ndaj të dhënat me
              mjekun apo familjen tënde.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Rreth Nesh -->
    <section class="container" id="rreth-nesh">
      <div class="text-center">

      </div>
      <h2 class="text-center mb-4">Rreth Nesh</h2>
      <p class="text-center text-muted mb-5">
        ZemraIme është një platformë inovative dedikuar monitorimit të shëndetit
        të zemrës në mënyrë të personalizuar. Ne kombinojmë dijen në mjekësi dhe
        teknologji për t’ju ofruar një përvojë të sigurt dhe të besueshme.
      </p>
      <div class="row text-center g-4">
        <div class="col-md-4">
          <div class="p-4 border rounded">
            <i class="fas fa-bullseye fa-2x text-danger mb-3"></i>
            <h5>Misioni Ynë</h5>
            <p>
              Të sjellim zgjidhje të avancuara për monitorimin e zemrës që janë
              të lehta për t’u përdorur dhe të besueshme.
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-4 border rounded">
            <i class="fas fa-eye fa-2x text-danger mb-3"></i>
            <h5>Vizioni Ynë</h5>
            <p>
              Një botë ku secili individ ka akses në vlerësime të menjëhershme
              dhe parashikime për shëndetin e zemrës.
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-4 border rounded">
            <i class="fas fa-heart fa-2x text-danger mb-3"></i>
            <h5>Vlerat Tonë</h5>
            <p>
              Integritet, përsosmëri teknologjike dhe respekt për privatësinë e
              të dhënave të përdoruesve.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Përfitimet -->
    <section class="container" id="perfitimet">
      <h2 class="text-center mb-4">Përfitimet e aplikacionit</h2>
      <div class="row text-center g-4">
        <div class="col-md-3">
          <div class="benefit-icon mb-2">💓</div>
          <p>Monitorim i personalizuar i shëndetit të zemrës</p>
        </div>
        <div class="col-md-3">
          <div class="benefit-icon mb-2">🔔</div>
          <p>Njoftime të menjëhershme për ndryshime të rrezikshme</p>
        </div>
        <div class="col-md-3">
          <div class="benefit-icon mb-2">📊</div>
          <p>Statistika dhe grafikë të qarta për çdo përdorues</p>
        </div>
        <div class="col-md-3">
          <div class="benefit-icon mb-2">🔒</div>
          <p>Siguri dhe privatësi për të dhënat tuaja</p>
        </div>
      </div>
<div class="text-center mt-5">
  <a href="keshilla.php" class="btn btn-start">Mëso më shumë</a>
</div>

    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center" id="kontakti">
      <div class="container">
        <p class="mb-1">
          &copy; 2025 ZemraIme. Të gjitha të drejtat e rezervuara.
        </p>
        <div class="mb-3">
          <a href="#" class="text-white me-3"
            ><img
              src="images/iconmonstr-facebook-6.svg"
              width="24"
              alt="Facebook"
          /></a>
          <a href="#" class="text-white me-3"
            ><img
              src="images/iconmonstr-instagram-14.svg"
              width="24"
              alt="Instagram"
          /></a>
          <a href="#" class="text-white me-3"
            ><img
              src="images/iconmonstr-twitter-3.svg"
              width="24"
              alt="Twitter"
          /></a>
          <a href="#" class="text-white"
            ><img
              src="images/iconmonstr-linkedin-5.svg"
              width="24"
              alt="LinkedIn"
          /></a>
        </div>
        <p class="mb-0">
          <strong>Email:</strong>
          <a href="mailto:info@zemraime.com" class="text-white"
            >info@zemraime.com</a
          >
          | <strong>Tel:</strong>
          <a href="tel:+38344123456" class="text-white">+383 44 123 456</a>
        </p>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>