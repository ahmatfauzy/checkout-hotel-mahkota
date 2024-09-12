fetch("../dll/deskripsi.txt")
        .then((response) => response.text())
        .then((data) => {
          const deskripsi = document.getElementById("deskripsiHotel");
          const paragraphs = data.split("\n\n"); // Memisahkan teks menjadi paragraf
          paragraphs.forEach((paragraph) => {
            const p = document.createElement("p");
            p.textContent = paragraph;
            deskripsi.appendChild(p);
          });
        })
        .catch((error) => {
          console.log("Terjadi kesalahan:", error);
        });