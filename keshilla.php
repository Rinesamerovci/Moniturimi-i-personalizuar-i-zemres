<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Këshilla për Shëndetin e Zemrës</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f0f4f8;
      color: #333;
    }

    header {
      background-color: #e63946;
      color: white;
      padding: 2rem;
      text-align: center;
      background-image: url('https://images.unsplash.com/photo-1514894781545-bd1c5d7e166f');
      background-size: cover;
      background-position: center;
    }

    header h1 {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.75rem;
      font-size: 2rem;
      margin: 0;
    }

    header h1 img {
      width: 40px;
      height: 40px;
      object-fit: contain;
    }

    .container {
      max-width: 900px;
      margin: 2rem auto;
      padding: 1rem;
    }

    .tip {
      background-color: white;
      border-radius: 16px;
      padding: 1.5rem;
      margin-bottom: 2rem;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      display: flex;
      gap: 1.5rem;
      align-items: flex-start;
      flex-wrap: wrap;
    }

    .tip img {
      max-width: 200px;
      width: 100%;
      height: auto;
      border-radius: 12px;
      flex-shrink: 0;
    }

    .tip-content {
      flex: 1;
    }

    .tip h2 {
      margin-top: 0;
      color: #1d3557;
      font-size: 1.5rem;
    }

    .tip ul {
      padding-left: 1.2rem;
      font-size: 1rem;
    }

    iframe {
      width: 100%;
      height: 315px;
      border-radius: 12px;
      margin-top: 1rem;
    }

    footer {
      background-color: #e63946;
      color: white;
      text-align: center;
      padding: 1rem 0;
      margin-top: 3rem;
      font-size: 0.9rem;
    }

    @media (max-width: 600px) {
      .tip {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }

      .tip ul {
        text-align: left;
      }

      header h1 {
        flex-direction: column;
        gap: 0.5rem;
        font-size: 1.5rem;
      }

      header h1 img {
        width: 30px;
        height: 30px;
      }
    }
  </style>
</head>
<body>
  <header>
    <h1>
      <img src="images/heartbeat.png" alt="Logo" />
      Këshilla për Shëndetin e Zemrës
    </h1>
  </header>

  <div class="container">

    <div class="tip">
      <img src="images/healthy.png" alt="Ushqimi i shëndetshëm" />
      <div class="tip-content">
        <h2>🍎 Ushqimi i Shëndetshëm</h2>
        <ul>
          <li>Konsumo fruta dhe perime çdo ditë.</li>
          <li>Zgjidh ushqime të pasura me fibra dhe të ulëta në yndyrë.</li>
          <li>Shmang kripën dhe sheqerin e tepër.</li>
        </ul>
      </div>
    </div>

    <div class="tip">
      <img src="images/physicalactivity.png" alt="Aktiviteti Fizik" />
      <div class="tip-content">
        <h2>🏃‍♀️ Aktiviteti Fizik</h2>
        <ul>
          <li>Bëj të paktën 30 minuta ushtrime, 5 herë në javë.</li>
          <li>Ecje, vrap, çiklizëm ose vallëzim – çfarëdo që të lëviz trupin.</li>
           <li>Aktiviteti fizik ndihmon në uljen e stresit dhe përmirëson humorin.</li>
        </ul>
      </div>
    </div>

    <div class="tip">
      <img src="images/Stressmanagement.png" alt="Menaxhimi i Stresit" />
      <div class="tip-content">
        <h2>😌 Menaxhimi i Stresit</h2>
        <ul>
          <li>Praktiko frymëmarrje të thellë ose meditim çdo ditë.</li>
          <li>Gjej kohë për relaksim dhe gjumë cilësor.</li>
           <li>Kërko ndihmë profesionale nëse ndihesh i/e mbingarkuar.</li>
        </ul>
      </div>
    </div>

    <div class="tip">
      <img src="images/MaintainingahealthyWeight.png" alt="Pesha e Shëndetshme" />
      <div class="tip-content">
        <h2>⚖️ Mbaj një Peshë të Shëndetshme</h2>
        <ul>
          <li>Mbipesha rrit rrezikun për tension të lartë dhe sëmundje zemre.</li>
          <li>Kujdesu për balancën mes kalorive dhe aktivitetit fizik.</li>
          <li>Mbaj një ditar ushqimi për të monitoruar dhe përmirësuar zakonet e tua.</li>
        </ul>
      </div>
    </div>

    <div class="tip">
      <img src="images/smoking.png" alt="Ndalimi i Duhanit" style="max-width: 150px;" />
      <div class="tip-content">
        <h2>🚭 Ndalimi i Duhanit</h2>
        <ul>
          <li>Duhani dëmton enët e gjakut.</li>
          <li>Lënia e duhanit përmirëson shëndetin e zemrës brenda pak javësh.</li>
          <li>Zëvendëso duhanin me aktivitete të shëndetshme për të shmangur stresin dhe urdhrin.</li>
        </ul>
      </div>
    </div>

    <div class="tip">
      <img src="images/HealthCheckup1.png" alt="Kontrolli i Tensionit" />
      <div class="tip-content">
        <h2>💊 Kontrolli i Tensionit dhe Kolesterolit</h2>
        <ul>
          <li>Bëj rregullisht kontrolla mjekësore.</li>
          <li>Ndiq këshillat e mjekut për barna ose dietë.</li>
           <li>Kujdesu për simptomat e para të problemeve të zemrës dhe vepro shpejt.</li>
        </ul>
      </div>
    </div>

    <div class="tip">
      <img src="images/SleepQuality.png" alt="Gjumi i Mirë" style="max-width: 150px;" />
      <div class="tip-content">
        <h2>💤 Gjumi i Mirë</h2>
        <ul>
          <li>Fliji 7–9 orë në natë.</li>
          <li>Gjumi cilësor ndihmon trupin të rikuperohet dhe ul tensionin e gjakut.</li>
         <li>Mos përdor telefona apo kompjuterë të paktën 1 orë para gjumit për të përmirësuar cilësinë.</li>
        </ul>
      </div>
    </div>

  </div>

  <footer>
    <p>&copy; 2025 Këshilla për Shëndetin e Zemrës. Të gjitha të drejtat e rezervuara.</p>
  </footer>
</body>
</html>
