window.onload = function () {
    // Function to wrap each letter of the text inside a span tag
    function wrapLetters() {
        const textElement = document.getElementById('em');
        const text = textElement.innerHTML;
        textElement.innerHTML = ''; // Clear the existing text

        // Wrap each letter in a span and append to the element
        for (let i = 0; i < text.length; i++) {
            const letter = document.createElement('span');
            letter.innerHTML = text[i];
            textElement.appendChild(letter);
            // Add a delay to the animation for each letter
            letter.style.animationDelay = `${i * 0.1}s`;
        }
    }

    // Call the function to wrap letters when page loads
    wrapLetters();
};
