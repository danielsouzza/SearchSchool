<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Moderno</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<!-- Navbar -->
<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <span class="text-2xl font-bold text-indigo-600">Dashboard</span>
            </div>

            <!-- Barra de Pesquisa -->
            <div class="flex items-center w-96">
                <form class="w-full">
                    <div class="relative">
                        <input
                            type="search"
                            placeholder="Pesquisar..."
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                        >
                        <button class="absolute right-3 top-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</nav>

<div class="max-w-7xl mx-auto px-4 py-6">
    <div class="flex gap-6">
        <!-- Conteúdo Principal -->
        <main class="flex-1">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Escolas</h2>

                <!-- Tabela -->
                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                        <tr class="bg-gray-50 text-gray-600 text-sm">
                            <th class="px-4 py-3 text-left">Nome</th>
                            <th class="px-4 py-3 text-left">Email</th>
                            <th class="px-4 py-3 text-left">Cargo</th>
                            <th class="px-4 py-3 text-left">Ações</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600">
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-3">João Silva</td>
                            <td class="px-4 py-3">joao@exemplo.com</td>
                            <td class="px-4 py-3">Desenvolvedor</td>
                        </tr>
                        <!-- Adicione mais linhas conforme necessário -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
