<template>
    <div class="min-vh-100" style="background: linear-gradient(135deg, #f8f9ff 0%, #e6eeff 100%);">
        <Header />
        
        <div class="container-fluid py-4">
            <!-- Header da página -->
            <PageHeader title="Candidaturas Recebidas" description="Visualize toda as candidaturas recebidas" iconClass="bi bi-people-fill" />

            <!-- Barra de pesquisa e estatísticas -->
            <div class="row mb-4">
                <div class="col-lg-8 col-md-7">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
                        <div class="card-body p-4">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text border-0" style="background: linear-gradient(135deg, #6f42c1 0%, #007bff 100%); border-radius: 12px 0 0 12px;">
                                    <i class="bi bi-search text-white"></i>
                                </span>
                                <input 
                                    type="text" 
                                    class="form-control border-0 px-4" 
                                    v-model="search" 
                                    placeholder="Pesquisar por nome, email, cargo..."
                                    style="border-radius: 0 12px 12px 0; background: #f8f9fa;"
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="card border-0 shadow-sm h-100 text-white" style="background: linear-gradient(135deg, #6f42c1 0%, #007bff 100%); border-radius: 16px;">
                        <div class="card-body p-4 d-flex align-items-center justify-content-center">
                            <div class="text-center">
                                <div class="h2 fw-bold mb-1">{{ total_items }}</div>
                                <div class="small opacity-75 text-uppercase fw-semibold">Total de Candidatos</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabela de currículos -->
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                        <div class="card-body p-0">
                            <AlertMessage />
                            
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead style="background: linear-gradient(135deg, #6f42c1 0%, #007bff 100%);">
                                        <tr>
                                            <th class="border-0 text-dark py-3 px-4 fw-semibold">
                                                <i class="bi bi-person me-2"></i>
                                                Candidato
                                            </th>
                                            <th class="border-0 text-dark py-3 px-4 fw-semibold">
                                                <i class="bi bi-envelope me-2"></i>
                                                E-mail
                                            </th>
                                            <th class="border-0 text-dark py-3 px-4 fw-semibold">
                                                <i class="bi bi-telephone me-2"></i>
                                                Telefone
                                            </th>
                                            <th class="border-0 text-dark py-3 px-4 fw-semibold">
                                                <i class="bi bi-briefcase me-2"></i>
                                                Cargo Desejado
                                            </th>
                                            <th class="border-0 text-dark py-3 px-4 fw-semibold">
                                                <i class="bi bi-collection-play me-2"></i> Ações
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="resume in resumes.data" :key="resume.id" class="border-bottom">
                                            <td class="py-3 px-4">
                                                <div class="d-flex align-items-center">
                                                    <span class="me-3">
                                                        <i class="bi bi-person-fill text-dark"></i>
                                                    </span>
                                                    <div>
                                                        <div class="fw-semibold text-dark">{{ (resume.name.split(' ')[0] + ' ' + resume.name.split(' ').slice(-1)).toUpperCase() }}</div>
                                                        <small class="text-muted">Recebida: {{ new Date(resume.created_at).toLocaleDateString('pt-BR') }} às {{ new Date(resume.created_at).toLocaleTimeString('pt-BR') }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4 text-primary fw-medium">{{ resume.email }}</td>
                                            <td class="py-3 px-4 text-dark">{{ resume.phone }}</td>
                                            <td class="py-3 px-4">
                                                <span class="badge rounded-pill px-3 py-2" style="background: rgba(111, 66, 193, 0.1); color: #6f42c1; font-weight: 600;">
                                                    {{ resume.desired_job }}
                                                </span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div>
                                                    <button class="btn btn-outline-primary btn-sm px-3 py-2 fw-semibold" style="border-radius: 10px;" @click="downloadResume(resume.id)"><i class="bi bi-download me-1"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Paginação -->
                            <div class="p-4 border-top" style="background: #f8f9fa;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-muted">
                                        <small class="fw-medium">
                                            Página {{ page_number }} de {{ total_pages }} 
                                            ({{ total_items }} candidatos no total)
                                        </small>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button 
                                            class="btn btn-outline-primary btn-sm px-3 py-2 fw-semibold" 
                                            :class="{ 'disabled': page_number == 1 }" 
                                            @click="previousPage"
                                            :disabled="page_number == 1"
                                            style="border-radius: 10px;"
                                        >
                                            <i class="bi bi-chevron-left me-1"></i>
                                            Anterior
                                        </button>
                                        <button 
                                            class="btn btn-outline-primary btn-sm px-3 py-2 fw-semibold" 
                                            :class="{ 'disabled': page_number == total_pages }" 
                                            @click="nextPage"
                                            :disabled="page_number == total_pages"
                                            style="border-radius: 10px;"
                                        >
                                            Próximo
                                            <i class="bi bi-chevron-right ms-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import { ref, onMounted, watch } from 'vue';
import axios from 'axios';
import Header from '../Components/Header.vue';
import AlertMessage from '../Components/AlertMessage.vue';
import PageHeader from '../Components/PageHeader.vue';

const page = usePage();

const resumes = ref([]);
const page_number = ref(1);
const search = ref('');
const per_page = ref(5);
const total_pages = ref(0);
const total_items = ref(0);

let searchTimeout;
watch(search, () => {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        getResumes();
    }, 500);
});

const getResumes = () => {
    axios.post('/admin/get-resumes', 
    { per_page: per_page.value, page: page_number.value, search: search.value }).then(response => {
        resumes.value = response.data;
        page_number.value = response.data.current_page;
        total_pages.value = response.data.last_page;
        total_items.value = response.data.total;
    }).catch(error => {
        console.log('error', error);
    });
}

const previousPage = () => {
    if(page_number.value > 1){
        page_number.value--;
        getResumes();
    }
    getResumes();
}

const nextPage = () => {
    if(page_number.value < total_pages.value){
        page_number.value++;
        getResumes();
    }
    getResumes();
}

const downloadResume = (id) => {
    window.open(`/admin/download-resume/${id}`, '_blank');
}

onMounted(() => {
    getResumes();
});

const logout = () => {
    router.post('/logout');
}
</script>
