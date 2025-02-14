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
            <div class="flex items-center">
                <span class="text-2xl font-bold text-indigo-600">Escolas</span>
            </div>
        </div>
    </div>
</nav>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <!-- Filtros -->
    <div class="mb-6">
        <form method="GET" action="{{ route('home') }}" class="w-full mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="relative">
                    <input
                        type="search"
                        name="search-school"
                        placeholder="Pesquisar escola..."
                        value="{{ request('search-school') }}"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 text-sm shadow-sm"
                    >
                </div>
                <div class="relative">
                    <input
                        type="search"
                        name="search-municipio"
                        placeholder="Filtrar por município..."
                        value="{{ request('search-municipio') }}"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 text-sm shadow-sm"
                    >
                </div>
                <button type="submit" class="w-full md:w-auto px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors text-sm font-medium">
                    Buscar
                </button>
            </div>
        </form>
    </div>

    <!-- Tabela -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-4 sm:p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 space-y-2 sm:space-y-0">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Lista de Escolas</h2>
                <span class="text-sm text-gray-500">Total: {{ count($schools) == 0 ? 0 : $schools->total()}} escolas</span>
            </div>

            <div class="overflow-x-auto pb-2">
                <table class="w-full min-w-[500px] sm:min-w-0">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-2 py-2 sm:px-4 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase">Bonus</th>
                        <th class="px-2 py-2 sm:px-4 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase">Escola</th>
                        <th class="px-2 py-2 sm:px-4 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase hidden sm:table-cell">Código INEP</th>
                        <th class="px-2 py-2 sm:px-4 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase">Município</th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                    @forelse($schools as $escola)
                        <tr
                            class="hover:bg-gray-50 cursor-pointer"
                            onclick="showSchoolDetails({{ json_encode($escola) }})"
                        >
                            <td class="px-2 py-2 sm:px-4 sm:py-3 text-sm text-gray-700">
                                <div class="flex items-center gap-1">
                                    @if($escola->municipio_proximo)
                                        <div class="flex items-center text-green-600">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    @else
                                        <div class="flex items-center text-red-600">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3 text-sm font-medium text-gray-900">
                                <div class="flex flex-col">
                                    <span>{{ $escola->escola }}</span>
                                    <span class="text-xs text-gray-500 sm:hidden mt-1">Código: {{ $escola->codigo_inep }} | {{ $escola->municipio }} - {{ $escola->uf }}</span>
                                </div>
                            </td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3 text-sm text-gray-700 hidden sm:table-cell">{{ $escola->codigo_inep }}</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3 text-sm text-gray-700">{{ $escola->municipio }} - {{ $escola->uf }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-sm text-gray-500">
                                Nenhum registro encontrado
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginação -->
            <div class="mt-4 px-2 sm:px-0">
                {{ count($schools) == 0 ? '' : $schools->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="schoolModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 overflow-y-auto ">
    <div class="relative min-h-screen flex items-center justify-center p-2">
        <div class="bg-white rounded-lg shadow-xl w-full mx-2 max-w-3xl">
            <div class="p-4">
                <div class="flex justify-between items-center mb-3">
                    <h3 class="text-base font-bold text-gray-800" id="modalSchoolName"></h3>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="space-y-2 text-sm">
                    <div class="grid grid-cols-2 gap-2">
                        <p class="font-medium">Código INEP:</p>
                        <p id="modalInep"></p>

                        <p class="font-medium">Endereço:</p>
                        <p id="modalAddress"></p>

                        <p class="font-medium">Telefone:</p>
                        <p id="modalPhone"></p>

                        <p class="font-medium">Município/UF:</p>
                        <p id="modalCity"></p>

                        <p class="font-medium">Localização:</p>
                        <p id="modalLocation"></p>

                        <p class="font-medium">Etapas/Modalidades:</p>
                        <p id="modalModality"></p>

                        <p class="font-medium">Bonificação:</p>
                        <p id="modalBonus"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showSchoolDetails(school) {
        const setModalText = (id, text) => {
            document.getElementById(id).textContent = text || 'Não informado';
        };

        setModalText('modalSchoolName', school.escola);
        setModalText('modalInep', school.codigo_inep);
        setModalText('modalAddress', school.endereco);
        setModalText('modalPhone', school.telefone);
        setModalText('modalCity', `${school.municipio} - ${school.uf}`);
        setModalText('modalLocation', school.localizacao);
        setModalText('modalModality', school.etapas_modalidade_ensino_oferecidas);

        // Configuração especial para Bonificação
        const bonusElement = document.getElementById('modalBonus');
        const isElegivel = school.municipio_proximo;
        bonusElement.textContent = isElegivel ? "Elegível" : "Não Elegível";

        // Resetar classes
        bonusElement.className = '';

        // Aplicar classes condicionais
        if(isElegivel) {
            bonusElement.classList.add('text-green-600', 'font-bold');
        } else {
            bonusElement.classList.add('text-red-600', 'font-bold');
        }

        document.getElementById('schoolModal').classList.remove('hidden');
    }

    // Restante do código permanece igual
    function closeModal() {
        document.getElementById('schoolModal').classList.add('hidden');
    }

    window.onclick = function(event) {
        const modal = document.getElementById('schoolModal');
        if (event.target === modal) {
            closeModal();
        }
    }
</script>
</body>
</html>
