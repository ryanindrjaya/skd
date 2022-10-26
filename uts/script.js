const output = document.getElementById("output");
const outputDec = document.getElementById("outputDec");

// debounce function
const debounce = (func, delay = 1000) => {
  let timeoutId;
  return (...args) => {
    if (timeoutId) {
      clearTimeout(timeoutId);
    }
    timeoutId = setTimeout(() => {
      func.apply(null, args);
    }, delay);
  };
};

// copy output content to clipboard
const copyToClipboard = (params) => {
  let content;

  if (params === "encrypt" && output.value) {
    content = output.value;

    navigator.clipboard.writeText(content).then(() => {
      Toastify({
        text: "Copied to clipboard",
        duration: 1000,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        style: {
          background: "#FFFFFF",
          color: "#000000",
        },
      }).showToast();
    });
  }
};

document.getElementById("plaintext").addEventListener(
  "input",
  debounce(async (e) => {
    const methodSelect = document.getElementById("method");
    const input = document.getElementById("plaintext").value;

    console.log("input", input);

    if (methodSelect.value !== "Silahkan pilih method...") {
      const res = await fetch("/skd/uts/encrypt.php", {
        method: "POST",
        body: JSON.stringify({
          text: input,
          method: methodSelect.value,
        }),
      });

      try {
        const data = await res.json();
        if (data.status === "success" && input !== "") {
          output.value = data.cipherText;
        } else if (data.status === "error") {
          output.value = data.message;
        } else {
          output.value = "";
        }
      } catch (err) {
        output.value = "The " + methodSelect.value + " method not supported";
      }
    } else {
      output.value = "Pilih metode terlebih dahulu";
    }
  }, 500)
);

document.getElementById("plaintextDec").addEventListener(
  "input",
  debounce(async (e) => {
    const methodSelectDec = document.getElementById("method");
    const inputDec = document.getElementById("plaintextDec").value;

    console.log("inputDec", inputDec);

    if (methodSelectDec.value !== "Silahkan pilih method...") {
      const res = await fetch("/skd/uts/decrypt.php", {
        method: "POST",
        body: JSON.stringify({
          text: inputDec,
          method: methodSelectDec.value,
        }),
      });

      try {
        const data = await res.json();
        if (data.status === "success" && inputDec !== "") {
          outputDec.value = data.decipherText;
        } else if (data.status === "error") {
          outputDec.value = data.message;
        } else {
          outputDec.value = "";
        }
      } catch (err) {
        outputDec.value = "Gagal mendekripsi";
      }
    } else {
      outputDec.value = "Pilih metode terlebih dahulu";
    }
  }, 500)
);
