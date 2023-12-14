const txtEffects = document.querySelectorAll(".text-effect");
let lines = [];
let displayText = "";
let currentElement;
let currentLine = "";
let maxLines = txtEffects.length;
let currentLineIndex = 0;
let currentCharIndex = 0;

//  For each element, store the text into an array before clearing it.
for (let i = 0; i < maxLines; i++) {
    lines.push(txtEffects[i].textContent);
    txtEffects[i].textContent = '';
}

/**
 * Go through each element/line in the array, and "type" out each character
 * Once all of the lines are done, stop the interval timer
 */
function typeEffect(){
    //  Check if there are lines to "type out"
    if (currentLineIndex < maxLines) {
        //  Get the current element and the text to display.
        currentElement = txtEffects[currentLineIndex];
        currentLine = lines[currentLineIndex];

        //  Add the next character to the text to display, and display it
        displayText += currentLine.charAt(currentCharIndex);
        currentElement.textContent = displayText;

        //  Update the current character to display for the next iteration
        currentCharIndex++;

        //  Check if all of the text has been displayed
        if (currentCharIndex == currentLine.length) {
            //  Move onto the next line/element
            currentLineIndex++;
            //  Reset values for next iteration
            currentCharIndex = 0;
            displayText = '';
        }
    } else {
        //  Once every effect is done, stop the timer
        clearInterval(effectTimer);
    }
    
        
}

//  Set the timer to repeatedly call the typeEffect every 100 miliseconds.
effectTimer = setInterval(typeEffect, 100);
