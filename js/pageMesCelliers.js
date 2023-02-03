/**
   * Fonctionnalités Page Ajouter Cellier
   */

  /**
   * Ouvrir la boite modale ajouter cellier
   */
  function ouvrirBoitesModalesMesCelliers() {

    let btnAjoutCellier = document.querySelector('[name="btnAjoutCellier"]')
    let btnModifierCellier = document.querySelectorAll('.btnModifierCellier')
    let btnSupprimerCellier = document.querySelectorAll('.btnSupprimerCellier')
    let popupFormAjouter = document.getElementById('popupFormAjouter')
    let popupFormModifier = document.getElementById('popupFormModifier')
    let modalContainer = document.getElementById('modal-container')
    let modalContainerModifier = document.getElementById('modal-container-modifier')
    let modalContainerSupprimer = document.getElementById('modal-container-supprimer')
    let popupFormSupprimer = document.getElementById('popupFormSupprimer')

    if (btnAjoutCellier) {
      btnAjoutCellier.addEventListener('click', function (evt) {
        evt.preventDefault();
        popupFormAjouter.style.display = 'block'
        modalContainer.style.display = 'block'
      })
    }

    if (btnModifierCellier) {
      [...btnModifierCellier].forEach(function(btnmodifier) {
          
        btnmodifier.addEventListener('click', function (evt) {
          evt.preventDefault();
          let idModif = evt.target.dataset.id
          console.log(idModif);
          popupFormModifier.style.display = 'block'
          modalContainerModifier.style.display = 'block'
        })
      })
    }
    if (btnSupprimerCellier) {
      [...btnSupprimerCellier].forEach(function(btnsupprimer) {
          
        btnsupprimer.addEventListener('click', function (evt) {
          evt.preventDefault();
          // console.log({evt});
          let idSuprimer = evt.target.dataset.id
          console.log(idSuprimer);

          popupFormSupprimer.style.display = 'block'
          modalContainerSupprimer.style.display = 'block'
  })
      })
    }

  }
  

  /**
   * Fermer la boite modale ajouter cellier
   */

  function fermerBoitesModalesMesCelliers() {

    let modalContainer = document.getElementById('modal-container')
    let modalContainerModifier = document.getElementById('modal-container-modifier')
    let modalContainerSupprimer = document.getElementById('modal-container-supprimer')
    let btnCloseModaleSupprimer = document.getElementById('closeFormSupprimer')
    let btnCloseX = document.getElementById('closeFormX')
    let btnCloseXmodifier = document.getElementById('closeFormXmodifier')
    let btnCloseXsupprimer = document.getElementById('closeFormXsupprimer')
    let popupFormAjouter = document.getElementById('popupFormAjouter')
    let popupFormModifier = document.getElementById('popupFormModifier')
    let popupFormSupprimer = document.getElementById('popupFormSupprimer')

    if (btnCloseModaleSupprimer) {
      btnCloseModaleSupprimer.addEventListener('click', function (evt) {
        evt.preventDefault();
        popupFormSupprimer.style.display = 'none'
        modalContainerSupprimer.style.display = 'none'
      })
    }
    if (btnCloseX) {
      btnCloseX.addEventListener('click', function (evt) {
        evt.preventDefault();
        popupFormAjouter.style.display = 'none'
        modalContainer.style.display = 'none'
      })
    }
    if (btnCloseXmodifier) {
      btnCloseXmodifier.addEventListener('click', function (evt) {
        evt.preventDefault();
        popupFormModifier.style.display = 'none'
        modalContainerModifier.style.display = 'none'
      })
    }
    if (btnCloseXsupprimer) {
      btnCloseXsupprimer.addEventListener('click', function (evt) {
        evt.preventDefault();
        popupFormSupprimer.style.display = 'none'
        modalContainerSupprimer.style.display = 'none'
      })
    }

  }

export { ouvrirBoitesModalesMesCelliers, fermerBoitesModalesMesCelliers }