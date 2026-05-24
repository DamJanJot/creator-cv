<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Creator CV - Generator CV</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/cv_style.css" />
  <style id="embeddedCVStyles">
    .generator-container {
      max-width: 1500px;
      margin: 2rem auto;
      padding: 1rem;
    }
    .generator-header {
      text-align: center;
      padding-bottom: 1rem;
      margin-bottom: 1rem;
      border-bottom: 1px solid rgba(0,0,0,.1);
    }
    .generator-header h1 {
      font-size: clamp(2rem, 2.8vw, 3rem);
      margin-bottom: .5rem;
    }
    .generator-grid {
      display: grid;
      grid-template-columns: 1.05fr .95fr;
      gap: 1.5rem;
    }
    .generator-form,
    .generator-preview {
      background: #fff;
      padding: 1.5rem;
      border-radius: 20px;
      box-shadow: 0 18px 50px rgba(22, 39, 65, 0.09);
    }
    .generator-form h2,
    .generator-preview h2 {
      margin-bottom: 1rem;
      font-weight: 700;
    }
    .cv-form label {
      font-weight: 600;
      margin-bottom: .35rem;
    }
    .cv-form textarea {
      min-height: 120px;
    }
    .action-buttons {
      display: flex;
      flex-wrap: wrap;
      gap: .75rem;
      margin-top: 1rem;
    }
    #cvPreview {
      min-height: 680px;
      border: 1px solid #dee2e6;
      border-radius: 16px;
      background: #f8f9fa;
      padding: 1rem;
      overflow: auto;
    }
    .preview-instruction {
      color: #6c757d;
      margin-top: 1rem;
    }
    .photo-preview img {
      max-width: 220px;
      border-radius: 14px;
      object-fit: cover;
    }
    .cv-card {
      width: 100%;
    }
    .cv-card .sidebar {
      border-radius: 16px 16px 0 0;
    }
    .preview-caption {
      font-size: .95rem;
      color: #555;
    }
    @media (max-width: 1100px) {
      .generator-grid {
        grid-template-columns: 1fr;
      }
    }
    @media print {
      body *:not(.cv-print-area):not(.cv-print-area *) {
        display: none !important;
      }
      .cv-print-area {
        width: 100% !important;
      }
    }
  </style>
</head>
<body>
  <div class="generator-container">
    <header class="generator-header">
      <h1>Generator CV</h1>
      <p class="lead">Wypełnij sekcje, kliknij Generuj i pobierz gotowe CV w formacie HTML lub wydrukuj do PDF.</p>
    </header>

    <div class="generator-grid">
      <section class="generator-form">
        <h2>Dane do CV</h2>
        <form id="cvForm" class="cv-form">
          <div class="row gy-3">
            <div class="col-12 col-md-6">
              <label for="fullName" class="form-label">Imię i nazwisko</label>
              <input type="text" id="fullName" class="form-control" placeholder="Jan Kowalski" required>
            </div>
            <div class="col-12 col-md-6">
              <label for="jobTitle" class="form-label">Stanowisko / nagłówek</label>
              <input type="text" id="jobTitle" class="form-control" placeholder="Junior Web Developer">
            </div>
            <div class="col-12 col-md-4">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" id="email" class="form-control" placeholder="jan.kowalski@example.com">
            </div>
            <div class="col-12 col-md-4">
              <label for="phone" class="form-label">Telefon</label>
              <input type="tel" id="phone" class="form-control" placeholder="123 456 789">
            </div>
            <div class="col-12 col-md-4">
              <label for="website" class="form-label">Portfolio / strona</label>
              <input type="url" id="website" class="form-control" placeholder="https://example.com">
            </div>
            <div class="col-12">
              <label for="photoUpload" class="form-label">Zdjęcie do CV</label>
              <input type="file" id="photoUpload" class="form-control" accept="image/*">
              <div id="photoUploadPreview" class="photo-preview mt-3"></div>
            </div>
            <div class="col-12">
              <label for="aboutMe" class="form-label">O mnie</label>
              <textarea id="aboutMe" class="form-control" placeholder="Napisz krótki opis swojej osoby..."></textarea>
            </div>
            <div class="col-12">
              <label for="skills" class="form-label">Umiejętności (oddzielone nową linią lub przecinkiem)</label>
              <textarea id="skills" class="form-control" placeholder="HTML\nCSS\nJavaScript\nPHP"></textarea>
            </div>
            <div class="col-12">
              <label for="courses" class="form-label">Kursy / certyfikaty (jeden w wierszu)</label>
              <textarea id="courses" class="form-control" placeholder="HTML5 & CSS3 Complete Course\nBootstrap 5 Course"></textarea>
            </div>
            <div class="col-12">
              <h3 class="h5">Doświadczenie zawodowe</h3>
            </div>
            <div class="col-12 mt-2">
              <label class="form-label">Firma 1</label>
            </div>
            <div class="col-12 col-md-4">
              <input type="text" id="company1" class="form-control" placeholder="Nazwa firmy 1">
            </div>
            <div class="col-12 col-md-4">
              <input type="text" id="position1" class="form-control" placeholder="Stanowisko 1">
            </div>
            <div class="col-12 col-md-4">
              <input type="text" id="period1" class="form-control" placeholder="Okres 1">
            </div>
            <div class="col-12">
              <textarea id="responsibilities1" class="form-control" placeholder="Opis obowiązków (jeden punkt w wierszu)"></textarea>
            </div>
            <div class="col-12 mt-2">
              <label class="form-label">Firma 2</label>
            </div>
            <div class="col-12 col-md-4">
              <input type="text" id="company2" class="form-control" placeholder="Nazwa firmy 2">
            </div>
            <div class="col-12 col-md-4">
              <input type="text" id="position2" class="form-control" placeholder="Stanowisko 2">
            </div>
            <div class="col-12 col-md-4">
              <input type="text" id="period2" class="form-control" placeholder="Okres 2">
            </div>
            <div class="col-12">
              <textarea id="responsibilities2" class="form-control" placeholder="Opis obowiązków (jeden punkt w wierszu)"></textarea>
            </div>
            <div class="col-12 mt-2">
              <label class="form-label">Firma 3</label>
            </div>
            <div class="col-12 col-md-4">
              <input type="text" id="company3" class="form-control" placeholder="Nazwa firmy 3">
            </div>
            <div class="col-12 col-md-4">
              <input type="text" id="position3" class="form-control" placeholder="Stanowisko 3">
            </div>
            <div class="col-12 col-md-4">
              <input type="text" id="period3" class="form-control" placeholder="Okres 3">
            </div>
            <div class="col-12">
              <textarea id="responsibilities3" class="form-control" placeholder="Opis obowiązków (jeden punkt w wierszu)"></textarea>
            </div>
            <div class="col-12">
              <h3 class="h5">Edukacja / kursy</h3>
            </div>
            <div class="col-12 mt-2">
              <label class="form-label">Edukacja 1</label>
            </div>
            <div class="col-12 col-md-4">
              <input type="text" id="education1" class="form-control" placeholder="Nazwa uczelni / kursu">
            </div>
            <div class="col-12 col-md-4">
              <input type="text" id="educationTitle1" class="form-control" placeholder="Kierunek / tytuł">
            </div>
            <div class="col-12 col-md-4">
              <input type="text" id="educationPeriod1" class="form-control" placeholder="Okres 1">
            </div>
            <div class="col-12">
              <textarea id="educationDesc1" class="form-control" placeholder="Krótki opis / osiągnięcia"></textarea>
            </div>
            <div class="col-12 mt-2">
              <label class="form-label">Edukacja 2</label>
            </div>
            <div class="col-12 col-md-4">
              <input type="text" id="education2" class="form-control" placeholder="Nazwa uczelni / kursu">
            </div>
            <div class="col-12 col-md-4">
              <input type="text" id="educationTitle2" class="form-control" placeholder="Kierunek / tytuł">
            </div>
            <div class="col-12 col-md-4">
              <input type="text" id="educationPeriod2" class="form-control" placeholder="Okres 2">
            </div>
            <div class="col-12">
              <textarea id="educationDesc2" class="form-control" placeholder="Krótki opis / osiągnięcia"></textarea>
            </div>
          </div>
        </form>
        <div class="action-buttons">
          <button id="generateBtn" type="button" class="btn btn-primary">Generuj CV</button>
          <button id="downloadBtn" type="button" class="btn btn-success" disabled>Pobierz HTML</button>
          <button id="printBtn" type="button" class="btn btn-secondary" disabled>Drukuj/PDF</button>
        </div>
      </section>

      <section class="generator-preview">
        <h2>Podgląd CV</h2>
        <div id="cvPreview">
          <div class="preview-caption">Podgląd pokaże się tutaj po kliknięciu „Generuj CV”.</div>
        </div>
        <p class="preview-instruction">Możesz zmodyfikować formularz i wygenerować CV ponownie, aby odświeżyć podgląd.</p>
      </section>
    </div>
  </div>

  <script src="./js/script.js"></script>
</body>
</html>
