function selectUserType(type, event) {
    // Remove active class from all options
    document.querySelectorAll('.user-type-option').forEach(option => {
        option.classList.remove('active');
    });
    
    // Add active class to selected option
    event.target.closest('.user-type-option').classList.add('active');
    
    // Check the radio button
    document.querySelector(`input[value="${type}"]`).checked = true;
}