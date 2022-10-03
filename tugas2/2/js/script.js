const password = document.getElementById("password");

password.addEventListener("keyup", function () {
  const complexity = document.getElementById("complexity");
  const button = document.getElementById("submit");

  let strength = 0;
  if (password.value.match(/[a-z]+/)) {
    strength += 1;
  }
  if (password.value.match(/[A-Z]+/)) {
    strength += 1;
  }
  if (password.value.match(/[0-9]+/)) {
    strength += 1;
  }
  if (password.value.match(/[$#&%]+/)) {
    complexity.innerText = "Password tidak boleh mengandung symbol!";
    complexity.classList.add("text-red-600");
  }
  if (password.value.length >= 8) {
    strength += 1;
  }
  switch (strength) {
    case 0:
      if (complexity.classList.contains("text-green-600")) {
        complexity.classList.remove("text-green-600");
      } else if (complexity.classList.contains("text-yellow-600")) {
        complexity.classList.remove("text-yellow-600");
      } else if (complexity.classList.contains("text-blue-600")) {
        complexity.classList.remove("text-blue-600");
      }

      if (button.classList.contains("bg-blue-600") && !button.hasAttribute("disabled")) {
        button.classList.remove("bg-blue-600");
        button.classList.add("bg-[#002D74]/50");
        button.setAttribute("disabled", "");
      }

      complexity.innerText = "Kekuatan password anda lemah";
      complexity.classList.add("text-red-600");

      break;
    case 1:
      if (complexity.classList.contains("text-green-600")) {
        complexity.classList.remove("text-green-600");
      } else if (complexity.classList.contains("text-yellow-600")) {
        complexity.classList.remove("text-yellow-600");
      } else if (complexity.classList.contains("text-blue-600")) {
        complexity.classList.remove("text-blue-600");
      }

      if (button.classList.contains("bg-blue-600") && !button.hasAttribute("disabled")) {
        button.classList.remove("bg-blue-600");
        button.classList.add("bg-[#002D74]/50");
        button.setAttribute("disabled", "");
      }

      complexity.innerText = "Kekuatan password anda lemah";
      complexity.classList.add("text-red-600");
      break;
    case 2:
      if (complexity.classList.contains("text-green-600")) {
        complexity.classList.remove("text-green-600");
      } else if (complexity.classList.contains("text-red-600")) {
        complexity.classList.remove("text-red-600");
      } else if (complexity.classList.contains("text-blue-600")) {
        complexity.classList.remove("text-blue-600");
      }

      if (button.classList.contains("bg-blue-600") && !button.hasAttribute("disabled")) {
        button.classList.remove("bg-blue-600");
        button.classList.add("bg-[#002D74]/50");
        button.setAttribute("disabled", "");
      }

      complexity.innerText = "Kekuatan password anda sedang";
      complexity.classList.add("text-yellow-600");

      break;
    case 3:
      if (complexity.classList.contains("text-green-600")) {
        complexity.classList.remove("text-green-600");
      } else if (complexity.classList.contains("text-red-600")) {
        complexity.classList.remove("text-red-600");
      } else if (complexity.classList.contains("text-blue-600")) {
        complexity.classList.remove("text-blue-600");
      }

      if (button.classList.contains("bg-blue-600") && !button.hasAttribute("disabled")) {
        button.classList.remove("bg-blue-600");
        button.classList.add("bg-[#002D74]/50");
        button.setAttribute("disabled", "");
      }

      complexity.innerText = "Kekuatan password anda sedang";
      complexity.classList.add("text-yellow-600");
      break;
    case 4:
      if (complexity.classList.contains("text-green-600")) {
        complexity.classList.remove("text-green-600");
      } else if (complexity.classList.contains("text-red-600")) {
        complexity.classList.remove("text-red-600");
      } else if (complexity.classList.contains("text-yellow-600")) {
        complexity.classList.remove("text-yellow-600");
      }

      if (button.classList.contains("bg-blue-600") && !button.hasAttribute("disabled")) {
        button.classList.remove("bg-blue-600");
        button.classList.add("bg-[#002D74]/50");
        button.setAttribute("disabled", "");
      }

      complexity.innerText = "Kekuatan password anda kuat";
      complexity.classList.add("text-blue-600");
      break;
    case 5:
      if (complexity.classList.contains("text-yellow-600")) {
        complexity.classList.remove("text-yellow-600");
      } else if (complexity.classList.contains("text-red-600")) {
        complexity.classList.remove("text-red-600");
      } else if (complexity.classList.contains("text-blue-600")) {
        complexity.classList.remove("text-blue-600");
      }

      complexity.innerText = "Kekuatan password anda sangat kuat";
      complexity.classList.add("text-green-600");
      button.removeAttribute("disabled");
      button.classList.remove("bg-[#002D74]/50");
      button.classList.add("bg-blue-600");
      break;
    default:
      complexity.innerText = "Password too weak";
      complexity.classList.add("text-red-600");
      break;
  }
});
