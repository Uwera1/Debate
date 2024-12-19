window.onload = function () {
    const textElement = document.getElementById('em');
    const text = textElement.textContent.trim(); // Get the text content of #em
    textElement.innerHTML = ''; // Clear the element content

    let index = 0; // Index to track the current letter
    const delay = 200; // Speed of animation per letter (200ms)
    
    function animateLetters() {
        if (index < text.length) {
            const letter = document.createElement('span');
            letter.textContent = text[index];
            letter.style.display = 'inline-block';
            letter.style.opacity = '0';
            letter.style.animation = `fadeInLetter 0.5s ease forwards`;
            textElement.appendChild(letter);
            index++;
        } else {
            // Reset animation after the entire word is displayed
            setTimeout(() => {
                index = 0;
                textElement.innerHTML = '';
                animateLetters(); // Start the animation again
            }, 1000); // Delay before restarting
        }
    }

    // Start animating letters
    setInterval(animateLetters, delay);
};

// CSS animation for each letter
const style = document.createElement('style');
style.innerHTML = `
    @keyframes fadeInLetter {
        0% { opacity: 0; transform: translateY(-10px); }
        100% { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);
