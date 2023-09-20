const phaseSelect = document.getElementById('phase-select');
const endDateContainer = document.getElementById('end-date-container');

phaseSelect.addEventListener('change', (event) => {
  const selectedPhase = event.target.value;

  if (selectedPhase === 'complete') {
    endDateContainer.style.display = 'block';
  } else {
    endDateContainer.style.display = 'none';
  }
});
