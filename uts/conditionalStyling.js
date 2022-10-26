let buttonState = "encrypt";
const encryptBtn = document.getElementById("encryptBtn");
const decryptBtn = document.getElementById("decryptBtn");
const encryptNode = document.getElementById("encrypt");
const decryptNode = document.getElementById("decrypt");

// change style of button
function changeStyle(params) {
  if (params === "encrypt") {
    encryptBtn.classList.remove("bg-[#002D74]/50");
    encryptBtn.classList.add("bg-blue-600");
    decryptBtn.classList.remove("bg-blue-600");
    decryptBtn.classList.add("bg-[#002D74]/50");
    encryptNode.classList.remove("hidden");
    encryptNode.classList.add("block");
    decryptNode.classList.remove("block");
    decryptNode.classList.add("hidden");
  } else if (params === "decrypt") {
    decryptBtn.classList.remove("bg-[#002D74]/50");
    decryptBtn.classList.add("bg-blue-600");
    encryptBtn.classList.remove("bg-blue-600");
    encryptBtn.classList.add("bg-[#002D74]/50");
    decryptNode.classList.remove("hidden");
    decryptNode.classList.add("block");
    encryptNode.classList.remove("block");
    encryptNode.classList.add("hidden");
  }
}
