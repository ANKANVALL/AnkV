const datafetch = '/rivals';

document.addEventListener("DOMContentLoaded", () => {
  fetchData();
});

async function fetchData(){
  try{
    const response = await fetch(datafetch);
    if(!response.ok) throw new Error("Error en solicitud: " + response.status);
    const data = await response.json();
    renderSlides(data.response);
    initSwiper();
  }catch(err){
    console.error(err);
  }
}
function renderSlides(data) {
  const wrapper = document.getElementById("swiper-wrapper");
  wrapper.innerHTML = '';

  data.forEach(char => {
    const slide = document.createElement("div");
    slide.className = "swiper-slide";
    slide.style.backgroundImage = `linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/ruta/a/fondos/${char.name.toLowerCase()}.jpg')`;
    slide.style.backgroundSize = "cover";
    slide.style.backgroundPosition = "center";

    const mainImage = `https://marvelrivalsapi.com${char.imageUrl}`;
    const costumeImage = char.costumes?.[0]?.icon ? `https://marvelrivalsapi.com/rivals${char.costumes[0].icon}` : null;

    const transformsHTML = (char.transformations || []).map(t => `
      <div class="transform-box">
        <img src="https://marvelrivalsapi.com/rivals${t.icon}" alt="${t.name}" class="transform-icon">
        <span>${t.name}</span>
      </div>
    `).join('');

    const ultimate = char.abilities?.find(a => a.type === "Ultimate");
    const ultimateHTML = ultimate ? `
      <div class="ability-box">
        <img src="https://marvelrivalsapi.com/rivals${ultimate.icon}" alt="${ultimate.name}" class="ability-icon">
        <div>
          <strong>${ultimate.name}</strong><br>
          <small>${ultimate.description}</small>
        </div>
      </div>
    ` : '';

    slide.innerHTML = `
      <div class="slide-overlay parent">
        <div class="character-info div2">
          <h1 class="char-name">${char.name.toUpperCase()}</h1>
          <div class="voice-actor">🎤 VA: No Disponible</div>
          <div class="char-description">${char.bio}</div>
          <div class="transformations">${transformsHTML}</div>
          ${ultimateHTML}
        </div>

        <div class="character-images div1">
          <img src="${mainImage}" alt="${char.name}" class="character-main">
          ${costumeImage ? `<img src="${costumeImage}" class="character-costume" alt="Skin">` : ''}
        </div>

        <div class="div3">
          <!-- Aquí puedes poner stats generales, botones o nombres del equipo -->
        </div>

        <div class="div4">
          <p><strong>Role:</strong> ${char.role}</p>
          <p><strong>Attack Type:</strong> ${char.attack_type}</p>
          <p><strong>Difficulty:</strong> ${char.difficulty}</p>
          <p><strong>Team:</strong> ${char.team?.join(', ') || 'N/A'}</p>
        </div>
      </div>
    `;

    wrapper.appendChild(slide);
  });
}


function generateColorFromName(name) {
  let hash = 0;
  for (let i = 0; i < name.length; i++) {
    hash = name.charCodeAt(i) + ((hash << 5) - hash);
  }
  return `hsl(${hash % 360}, 60%, 25%)`;
}

function initSwiper() {
  const swiper = new Swiper('.myCarousel', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    on: {
      slideChangeTransitionStart: function () {
        gsap.to('.swiper-slide-active .character-info', { opacity: 0, y: -50, duration: 0.3 });
        gsap.to('.swiper-slide-active .character-images', { opacity: 0, y: 50, duration: 0.3 });
      },
      slideChangeTransitionEnd: function () {
        gsap.fromTo('.swiper-slide-active .character-info',
          { opacity: 0, y: 50 },
          { opacity: 1, y: 0, duration: 0.6, ease: 'power2.out' }
        );
        gsap.fromTo('.swiper-slide-active .character-images',
          { opacity: 0, y: -50 },
          { opacity: 1, y: 0, duration: 0.6, ease: 'power2.out' }
        );
      }
    }
  });
}

