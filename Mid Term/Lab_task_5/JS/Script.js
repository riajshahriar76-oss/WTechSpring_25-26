function analyzeText() {
let text = document.getElementById("textInput").value;
if (text.trim() === "") {
document.getElementById("result").innerHTML = "<p>Please enter some text!</p>";
return;
}
let charCount = text.length;
let wordCount = text.trim().split(/\s+/).length;
let reversedText = text.split("").reverse().join("");
let output = "<h3>Analysis Result</h3>";
output += "<p><b>Total Characters:</b> " + charCount + "</p>";
output += "<p><b>Total Words:</b> " + wordCount + "</p>";
output += "<p><b>Reversed Text:</b> " + reversedText + "</p>";
document.getElementById("result").innerHTML = output;
}