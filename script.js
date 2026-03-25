document.addEventListener("DOMContentLoaded", () => {
    const searchInputs = document.querySelectorAll(".autocomplete-input");

    searchInputs.forEach((input) => {
        const wrapper = input.closest(".search-area, .hero-search");
        const list = wrapper.querySelector(".autocomplete-list");

        input.addEventListener("input", async () => {
            const query = input.value.trim();

            if (query.length === 0) {
                list.innerHTML = "";
                list.style.display = "none";
                return;
            }

            try {
                const response = await fetch(`autocomplete.php?q=${encodeURIComponent(query)}`);
                const data = await response.json();

                list.innerHTML = "";

                if (
                    data.starts_with.length === 0 &&
                    data.contains.length === 0
                ) {
                    list.innerHTML = `<li><span class="separator">Aucun résultat</span></li>`;
                    list.style.display = "block";
                    return;
                }

                if (data.starts_with.length > 0) {
                    const title1 = document.createElement("li");
                    title1.innerHTML = `<span class="separator">Commencent par "${escapeHtml(query)}"</span>`;
                    list.appendChild(title1);

                    data.starts_with.forEach((item) => {
                        const li = document.createElement("li");
                        li.innerHTML = `
                            <a href="element.php?id=${item.id}">
                                ${escapeHtml(item.nom)}
                            </a>
                        `;
                        list.appendChild(li);
                    });
                }

                if (data.contains.length > 0) {
                    const title2 = document.createElement("li");
                    title2.innerHTML = `<span class="separator">Contiennent "${escapeHtml(query)}"</span>`;
                    list.appendChild(title2);

                    data.contains.forEach((item) => {
                        const li = document.createElement("li");
                        li.innerHTML = `
                            <a href="element.php?id=${item.id}">
                                ${escapeHtml(item.nom)}
                            </a>
                        `;
                        list.appendChild(li);
                    });
                }

                list.style.display = "block";
            } catch (error) {
                list.innerHTML = `<li><span class="separator">Erreur lors du chargement</span></li>`;
                list.style.display = "block";
            }
        });

        document.addEventListener("click", (e) => {
            if (!wrapper.contains(e.target)) {
                list.style.display = "none";
            }
        });

        input.addEventListener("focus", () => {
            if (list.innerHTML.trim() !== "") {
                list.style.display = "block";
            }
        });
    });
});

function escapeHtml(text) {
    const div = document.createElement("div");
    div.innerText = text;
    return div.innerHTML;
}