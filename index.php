<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arama Çubuğu Örneği</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .search-container {
            margin-bottom: 20px;
        }

        #search-bar {
            width: 300px;
            padding: 10px;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        #results {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <input type="text" id="search-bar" placeholder="Arama yapın...">
        <button onclick="search()">Ara</button>
    </div>
    <div id="results"></div>

    <script>
        async function search() {
            const query = document.getElementById('search-bar').value;
            const resultsContainer = document.getElementById('results');
            resultsContainer.innerHTML = '';

            try {
                const response = await fetch(`search.php?query=${encodeURIComponent(query)}`);
                const results = await response.json();

                if (results.length > 0) {
                    results.forEach(result => {
                        const resultItem = document.createElement('div');
                        resultItem.textContent = result;
                        resultsContainer.appendChild(resultItem);
                    });
                } else {
                    resultsContainer.textContent = 'Sonuç bulunamadı.';
                }
            } catch (error) {
                resultsContainer.textContent = 'Bir hata oluştu.';
                console.error('Error fetching search results:', error);
            }
        }
    </script>
</body>
</html>

