(function () {
  console.log("Voici le carrousel");
  const carrousels = document.querySelectorAll(".carrousel");
  const radios = document.querySelectorAll(".carrousel__radio");
  const heroText = document.querySelector(".hero__contenu");

  // Affiche le texte dès le chargement
  if (heroText) {
    heroText.classList.add("active");
  }

  radios.forEach((radio, index) => {
    radio.addEventListener("change", () => {
      initialise_carrousel();
      carrousels[index].classList.add("active");

      // Réinitialiser l’animation du texte
      if (heroText) {
        heroText.classList.remove("active");
        setTimeout(() => {
          heroText.classList.add("active");
        }, 500);
      }
    });
  });

  function initialise_carrousel() {
    carrousels.forEach((carrousel) => {
      carrousel.classList.remove("active");
    });
  }

  let currentIndex = 0;
  setInterval(() => {
    currentIndex = (currentIndex + 1) % radios.length;
    radios[currentIndex].checked = true;
    radios[currentIndex].dispatchEvent(new Event("change"));
  }, 3000);
})();
