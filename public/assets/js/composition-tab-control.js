document.addEventListener('DOMContentLoaded', function() {
    const compositionSelect = document.getElementById('composition_option_id');
    const composedTab = document.querySelector('a.nav-link[data-tab="composed"]');
    
    function updateCompositionTabState() {
        const selectedOption = compositionSelect.options[compositionSelect.selectedIndex];
        const optionText = selectedOption.textContent.trim();
        
        if (optionText.toUpperCase() === 'NO') {
            composedTab.classList.add('disabled');
            composedTab.style.pointerEvents = 'none';
            composedTab.style.opacity = '0.6';
            
            if (composedTab.classList.contains('active')) {
                document.querySelector('a.nav-link[data-tab="price"]').click();
            }
        } else {
            composedTab.classList.remove('disabled');
            composedTab.style.pointerEvents = 'auto';
            composedTab.style.opacity = '1';
        }
    }
    
    updateCompositionTabState();
    
    compositionSelect.addEventListener('change', updateCompositionTabState);
});