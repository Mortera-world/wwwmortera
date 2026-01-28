function openImage(img) {
    var modal22 = document.getElementById("image-modal22");
    var modal22Img = document.getElementById("full-image");
    
    modal22.style.display = "block";
    modal22Img.src = img.src;
}

function closeImage22() {
    var modal = document.getElementById("image-modal22");
    modal.style.display = "none";
}

        function showSection(sectionId) {
            const sections = document.querySelectorAll('section');
            sections.forEach(section => {
                if (section.id === sectionId) {
                    section.classList.add('active');
                } else {
                    section.classList.remove('active');
                }
            });

            if (sectionId === 'bestitems') {
                showSubSection('knight');
            }
        }

        function showSubSection(subSectionId) {
            const subSections = document.querySelectorAll('.sub-section');
            subSections.forEach(subSection => {
                if (subSection.id === subSectionId) {
                    subSection.classList.add('active');
                } else {
                    subSection.classList.remove('active');
                }
            });
        }
		
function openCard(cardId) {
    document.getElementById(cardId).style.display = 'block';
}

function closeCard(cardId) {
    document.getElementById(cardId).style.display = 'none';
}
function openModal(modalId) {
    document.getElementById(modalId).style.display = "block";
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

window.onclick = function(event) {
    var modals = document.getElementsByClassName("modal");
    for (var i = 0; i < modals.length; i++) {
        if (event.target == modals[i]) {
            modals[i].style.display = "none";
        }
    }
}

function showContent(section) {
    // Hide all sections
    const sections = document.querySelectorAll('.info-section');
    sections.forEach(sec => sec.style.display = 'none');

    // Show the selected section
    document.getElementById(section).style.display = 'block';
}