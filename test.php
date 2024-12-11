<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searchable Dropdown</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
                /* styles.css */
        #search {
            width: 300px;
            padding: 8px;
            font-size: 16px;
        }

        .dropdown {
            display: none;  /* Initially hidden */
            position: absolute;
            top: 40px;  /* Adjust based on the input box height */
            width: 300px;
            max-height: 200px;
            overflow-y: auto;  /* Enables scrolling */
            border: 1px solid #ccc;
            background-color: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dropdown div {
            padding: 8px;
            cursor: pointer;
        }

        .dropdown div:hover {
            background-color: #f0f0f0;
        }

    </style>

    <input type="text" id="search" placeholder="Start typing..." onkeyup="filterNames()">
    <div class="dropdown-list" id="dropdown_list"></div>

    <script>
            // script.js
        const names = ["Alice", "Bob", "Charlie", "David", "Eve", "Frank", "Grace", "Hannah", "Ivy", "Jack", "Kelly"];

        function filterNames() {
        const input = document.getElementById('search').value.toLowerCase();
        const dropdown = document.getElementById('dropdown');
        dropdown.innerHTML = '';  // Clear previous results

        if (input.length === 0) {
            dropdown.style.display = 'none';  // Hide dropdown if input is empty
            return;
        }

        const filteredNames = names.filter(name => name.toLowerCase().includes(input));

        if (filteredNames.length > 0) {
            dropdown.style.display = 'block';  // Show dropdown
            filteredNames.forEach(name => {
                const div = document.createElement('div');
                div.textContent = name;
                div.onclick = () => selectName(name);
                dropdown.appendChild(div);
            });
        } else {
            dropdown.style.display = 'none';  // Hide dropdown if no match found
        }
        }

        function selectName(name) {
        document.getElementById('search').value = name;
        document.getElementById('dropdown').style.display = 'none';  // Hide dropdown after selection
        }

    </script>
</body>
</html>
