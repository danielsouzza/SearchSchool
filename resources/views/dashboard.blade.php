<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Escolas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<!-- Navbar -->
<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 py-2">
            <!-- Logo -->
            <div class="flex items-center">
                <span class="text-2xl font-bold text-indigo-600">Escolas</span>
            </div>
        </div>
    </div>
</nav>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <!-- Barra de Pesquisa -->
    <div class="mb-6">
        <form class="w-full max-w-2xl mx-auto">
            <div class="relative">
                <input
                    type="search"
                    placeholder="Pesquisar escolas..."
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 text-sm shadow-sm"
                >
                <button class="absolute right-3 top-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <!-- Tabela -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-4 sm:p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Lista de Escolas</h2>
                <span class="text-sm text-gray-500">Total: 0 escolas</span>
            </div>

            <div class="overflow-x-auto pb-2">
                <table class="w-full min-w-[1200px] sm:min-w-0">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 sm:px-4 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">Restrição Atend.</th>
                        <th class="px-3 py-2 sm:px-4 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">Escola</th>
                        <th class="px-3 py-2 sm:px-4 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">Código INEP</th>
                        <th class="px-3 py-2 sm:px-4 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">UF</th>
                        <th class="px-3 py-2 sm:px-4 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">Município</th>
                        <th class="px-3 py-2 sm:px-4 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">Localização</th>
                        <th class="px-3 py-2 sm:px-4 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">Local. Diferenciada</th>
                        <th class="px-3 py-2 sm:px-4 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">Categoria Admin.</th>
                        <th class="px-3 py-2 sm:px-4 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">Endereço</th>
                        <th class="px-3 py-2 sm:px-4 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">Telefone</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td colspan="10" class="px-4 py-4 text-center text-sm text-gray-500">
                            Nenhum registro encontrado
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
