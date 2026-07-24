const cvForm = document.getElementById('cvForm');
const cvPreview = document.getElementById('cvPreview');
const generateBtn = document.getElementById('generateBtn');
const downloadBtn = document.getElementById('downloadBtn');
const printBtn = document.getElementById('printBtn');
const photoUpload = document.getElementById('photoUpload');
const photoUploadPreview = document.getElementById('photoUploadPreview');
let photoData = '';

if (photoUpload) {
  photoUpload.addEventListener('change', handlePhotoUpload);
}

function handlePhotoUpload(event) {
  const file = event.target.files[0];
  photoData = '';
  if (!file) {
    if (photoUploadPreview) photoUploadPreview.innerHTML = '';
    return;
  }

  if (!file.type.startsWith('image/')) {
    alert('Wybierz plik obrazu (jpg, png, webp itp.).');
    event.target.value = '';
    if (photoUploadPreview) photoUploadPreview.innerHTML = '';
    return;
  }

  const reader = new FileReader();
  reader.onload = () => {
    photoData = reader.result;
    if (photoUploadPreview) {
      photoUploadPreview.innerHTML = `<img src="${photoData}" alt="Podgląd zdjęcia" style="max-width: 220px; max-height: 260px; border-radius: 14px; object-fit: cover;">`;
    }
  };
  reader.readAsDataURL(file);
}

function parseLines(value) {
  return value
    .split(/\r?\n|,/)   
    .map(line => line.trim())
    .filter(line => line.length > 0);
}

const htmlEscapeMap = {
  '&': '&amp;',
  '<': '&lt;',
  '>': '&gt;',
  '"': '&quot;',
  "'": '&#39;',
};

function safeText(value, fallback = '') {
  const text = value ? String(value) : fallback;
  return text.replace(/[&<>"']/g, character => htmlEscapeMap[character]);
}

function safeUrl(value) {
  if (!value) {
    return '';
  }

  try {
    const url = new URL(value);
    return ['http:', 'https:'].includes(url.protocol) ? safeText(url.href) : '';
  } catch (error) {
    return '';
  }
}

function safeEmailHref(value) {
  const email = value ? String(value).trim() : '';

  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    return '';
  }

  return `mailto:${safeText(email)}`;
}

function createList(items) {
  if (!items.length) {
    return '';
  }
  return `<ul>${items.map(item => `<li>${safeText(item)}</li>`).join('')}</ul>`;
}

function createExperienceBlock(company, position, period, responsibilities) {
  const entries = parseLines(responsibilities);
  if (!company && !position && !period && !entries.length) {
    return '';
  }
  return `
    <div class="job p-2">
      <h4>${safeText(company || 'Firma')}</h4>
      ${position ? `<b>${safeText(position)}</b>` : ''}
      ${period ? `<p class="text-muted">${safeText(period)}</p>` : ''}
      ${createList(entries)}
    </div>
  `;
}

function createEducationBlock(place, title, period, description) {
  if (!place && !title && !period && !description) {
    return '';
  }
  return `
    <div class="job p-2">
      <h4>${safeText(place || 'Instytucja')}</h4>
      ${title ? `<b>${safeText(title)}</b>` : ''}
      ${period ? `<p class="text-muted">${safeText(period)}</p>` : ''}
      ${description ? `<p>${safeText(description)}</p>` : ''}
    </div>
  `;
}

function buildCVHTML(data) {
  const skillItems = parseLines(data.skills);
  const courseItems = parseLines(data.courses);
  const experiences = [1, 2, 3].map(i => createExperienceBlock(
    data[`company${i}`],
    data[`position${i}`],
    data[`period${i}`],
    data[`responsibilities${i}`]
  )).filter(Boolean).join('<hr>');

  const educationBlocks = [1, 2].map(i => createEducationBlock(
    data[`education${i}`],
    data[`educationTitle${i}`],
    data[`educationPeriod${i}`],
    data[`educationDesc${i}`]
  )).filter(Boolean).join('<hr>');

  const cvTitle = safeText(data.fullName, 'Twoje Imię i Nazwisko');
  const cvRole = safeText(data.jobTitle, 'Stanowisko lub nagłówek');
  const aboutMe = safeText(data.aboutMe);
  const photoHtml = data.photoData ? `<div class="photo-holder" style="margin-bottom: 1rem;"><img src="${data.photoData}" alt="Zdjęcie w CV" style="width: 100%; border-radius: 16px; object-fit: cover;"></div>` : '';
  const consentText = 'Wyrażam zgodę na przetwarzanie danych osobowych zawartych w niniejszym dokumencie do realizacji procesu rekrutacji zgodnie z ustawą z dnia 10 maja 2018 roku o ochronie danych osobowych (Dz. Ustaw z 2018, poz. 1000) oraz zgodnie z Rozporządzeniem Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE (RODO).';
  const emailHref = safeEmailHref(data.email);
  const websiteHref = safeUrl(data.website);
  const websiteHtml = data.website
    ? `<p>Strona: ${websiteHref ? `<a href="${websiteHref}" target="_blank" rel="noopener noreferrer">${safeText(data.website)}</a>` : safeText(data.website)}</p>`
    : '';

  return `
    <div class="cv-print-area">
      <div class="container cv-card">
        <aside class="sidebar">
          <div class="sidebar-top">
            ${photoHtml}
            <h1>${cvTitle}</h1>
            <p>${cvRole}</p>
          </div>
          <div class="sidebar-menu">
            <div class="contact py-1">
              ${data.email ? `<p>E-mail: ${emailHref ? `<a href="${emailHref}">${safeText(data.email)}</a>` : safeText(data.email)}</p>` : ''}
              ${data.phone ? `<p>Telefon: ${safeText(data.phone)}</p>` : ''}
              ${websiteHtml}
            </div>
          </div>
        </aside>
        <main class="content">
          ${aboutMe ? `<section><h2>O mnie</h2><p>${aboutMe}</p></section>` : ''}
          ${skillItems.length ? `<section><h2>Umiejętności</h2>${createList(skillItems)}</section>` : ''}
          ${courseItems.length ? `<section><h2>Kursy i certyfikaty</h2>${createList(courseItems)}</section>` : ''}
          ${experiences ? `<section><h2>Doświadczenie zawodowe</h2>${experiences}</section>` : ''}
          ${educationBlocks ? `<section><h2>Edukacja / kursy</h2>${educationBlocks}</section>` : ''}
          <section>
            <p class="zgoda text-muted" style="font-size: 0.82rem; line-height: 1.6; margin-top: 1.5rem; color: #6c757d;">${safeText(consentText)}</p>
          </section>
        </main>
      </div>
    </div>
  `;
}

function collectFormData() {
  const formData = {};
  const inputs = cvForm.querySelectorAll('input, textarea');
  inputs.forEach(input => {
    formData[input.id] = input.value.trim();
  });
  formData.photoData = photoData || '';
  return formData;
}

function generateCV() {
  const data = collectFormData();
  if (!data.fullName) {
    alert('Podaj imię i nazwisko, aby wygenerować CV.');
    return;
  }
  const html = buildCVHTML(data);
  cvPreview.innerHTML = html;
  downloadBtn.disabled = false;
  printBtn.disabled = false;
}

function downloadCV() {
  const data = collectFormData();
  const content = buildCVHTML(data);
  const style = document.getElementById('embeddedCVStyles').innerHTML;
  const html = `<!DOCTYPE html><html lang="pl"><head><meta charset="UTF-8"><title>${safeText(data.fullName)} - CV</title><style>${style}</style><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"></head><body>${content}</body></html>`;
  const blob = new Blob([html], { type: 'text/html;charset=utf-8' });
  const link = document.createElement('a');
  link.href = URL.createObjectURL(blob);
  link.download = `${data.fullName ? data.fullName.replace(/\s+/g, '_') : 'CV'}.html`;
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}

function printCV() {
  const data = collectFormData();
  const content = buildCVHTML(data);
  const style = document.getElementById('embeddedCVStyles').innerHTML;
  const printWindow = window.open('', '_blank');
  if (!printWindow) {
    alert('Przeglądarka zablokowała otwieranie nowego okna. Zezwól na wyskakujące okna, by wydrukować CV.');
    return;
  }
  printWindow.document.write(`<!DOCTYPE html><html lang="pl"><head><meta charset="UTF-8"><title>${safeText(data.fullName)} - CV</title><style>${style}</style><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"></head><body>${content}</body></html>`);
  printWindow.document.close();
  printWindow.focus();
  printWindow.print();
}

generateBtn.addEventListener('click', generateCV);
downloadBtn.addEventListener('click', downloadCV);
printBtn.addEventListener('click', printCV);
