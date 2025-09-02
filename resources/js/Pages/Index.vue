<template>
    <div class="min-vh-100" style="background: linear-gradient(135deg, #f8f9ff 0%, #e6eeff 100%);">
        <!-- Header elegante -->
        <div class="container-fluid py-4">
        <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #6f42c1 0%, #007bff 100%); border-radius: 20px;">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-white">
                                    <h1 class="h3 mb-1 fw-bold">
                                        <i class="bi bi-briefcase-fill me-2"></i>
                                        Paytour Carreiras
                                    </h1>
                                    <p class="mb-0 opacity-75">Faça parte da nossa equipe de sucesso</p>
                                </div>
                <div>
                                    <a href="/admin/login" class="btn btn-light btn-sm px-3 py-2 fw-semibold">
                                        <i class="bi bi-shield-lock me-1"></i>
                                        Área Admin
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulário principal -->
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 col-xl-6">
                    <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                        <!-- Header do formulário -->
                        <div class="card-header border-0 text-center py-4" style="background: linear-gradient(135deg, #6f42c1 0%, #007bff 100%); border-radius: 20px 20px 0 0;">
                            <h2 class="h4 text-white mb-1 fw-bold">
                                <i class="bi bi-person-plus-fill me-2"></i>
                                Envie seu Currículo
                            </h2>
                            <p class="text-white-50 mb-0">Preencha os dados abaixo e junte-se ao nosso time</p>
                        </div>

                        <!-- Corpo do formulário -->
                        <div class="card-body p-4">
                            <AlertMessage />
                            
                            <form @submit.prevent="submit">
                                <!-- Nome -->
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-semibold text-dark">
                                        <i class="bi bi-person text-primary me-1"></i>
                                        Nome Completo
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control form-control-lg border-2" 
                                        :class="{ 'border-danger': page.props.errors.name, 'border-primary': !page.props.errors.name }"
                                        id="name" 
                                        name="name" 
                                        v-model="form.name"
                                        placeholder="Digite seu nome completo"
                                        style="border-radius: 12px;"
                                    >
                                    <div class="text-danger mt-1 small" v-if="page.props.errors.name">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        {{ page.props.errors.name[0] }}
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold text-dark">
                                        <i class="bi bi-envelope text-primary me-1"></i>
                                        E-mail
                                    </label>
                                    <input 
                                        type="email" 
                                        class="form-control form-control-lg border-2" 
                                        :class="{ 'border-danger': page.props.errors.email, 'border-primary': !page.props.errors.email }"
                                        id="email" 
                                        name="email" 
                                        v-model="form.email"
                                        placeholder="seu.email@exemplo.com"
                                        style="border-radius: 12px;"
                                    >
                                    <div class="text-danger mt-1 small" v-if="page.props.errors.email">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        {{ page.props.errors.email[0] }}
                                    </div>
                                </div>

                                <!-- Telefone -->
                                <div class="mb-3">
                                    <label for="phone" class="form-label fw-semibold text-dark">
                                        <i class="bi bi-telephone text-primary me-1"></i>
                                        Telefone
                                    </label>
                                    <input 
                                        type="tel" 
                                        class="form-control form-control-lg border-2" 
                                        :class="{ 'border-danger': page.props.errors.phone, 'border-primary': !page.props.errors.phone }"
                                        id="phone" 
                                        name="phone" 
                                        v-model="form.phone"
                                        placeholder="(11) 99999-9999"
                                        style="border-radius: 12px;"
                                    >
                                    <div class="text-danger mt-1 small" v-if="page.props.errors.phone">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        {{ page.props.errors.phone[0] }}
                                    </div>
                                </div>

                                <!-- Cargo Desejado -->
                                <div class="mb-3">
                                    <label for="desired_job" class="form-label fw-semibold text-dark">
                                        <i class="bi bi-briefcase text-primary me-1"></i>
                                        Cargo Desejado
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control form-control-lg border-2" 
                                        :class="{ 'border-danger': page.props.errors.desired_job, 'border-primary': !page.props.errors.desired_job }"
                                        id="desired_job" 
                                        name="desired_job" 
                                        v-model="form.desired_job"
                                        placeholder="Ex: Desenvolvedor, Designer, etc."
                                        style="border-radius: 12px;"
                                    >
                                    <div class="text-danger mt-1 small" v-if="page.props.errors.desired_job">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        {{ page.props.errors.desired_job[0] }}
                                    </div>
                                </div>

                                <!-- Escolaridade -->
                                <div class="mb-3">
                                    <label for="education" class="form-label fw-semibold text-dark">
                                        <i class="bi bi-mortarboard text-primary me-1"></i>
                                        Escolaridade
                                    </label>
                                    <select 
                                        class="form-select form-select-lg border-2" 
                                        :class="{ 'border-danger': page.props.errors.education, 'border-primary': !page.props.errors.education }"
                                        id="education" 
                                        name="education" 
                                        v-model="form.education"
                                        style="border-radius: 12px;"
                                    >
                                        <option value="">Selecione sua escolaridade</option>
                                        <option value="Ensino Fundamental">Ensino Fundamental</option>
                                        <option value="Ensino Médio">Ensino Médio</option>
                                        <option value="Ensino Superior">Ensino Superior</option>
                                        <option value="Pós-graduação">Pós-graduação</option>
                                        <option value="Mestrado">Mestrado</option>
                                        <option value="Doutorado">Doutorado</option>
                                    </select>
                                    <div class="text-danger mt-1 small" v-if="page.props.errors.education">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        {{ page.props.errors.education[0] }}
                                    </div>
                                </div>

                                <!-- Observações -->
                                <div class="mb-3">
                                    <label for="observations" class="form-label fw-semibold text-dark">
                                        <i class="bi bi-chat-text text-primary me-1"></i>
                                        Observações
                                    </label>
                                    <textarea 
                                        class="form-control border-2" 
                                        :class="{ 'border-danger': page.props.errors.observations, 'border-primary': !page.props.errors.observations }"
                                        id="observations" 
                                        name="observations" 
                                        v-model="form.observations"
                                        rows="4"
                                        placeholder="Conte-nos um pouco sobre você, suas experiências..."
                                        style="border-radius: 12px; resize: vertical;"
                                    ></textarea>
                                    <div class="text-danger mt-1 small" v-if="page.props.errors.observations">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        {{ page.props.errors.observations[0] }}
                                    </div>
                                </div>

                                <!-- Upload de Arquivo -->
                                <div class="mb-4">
                                    <label for="file" class="form-label fw-semibold text-dark">
                                        <i class="bi bi-cloud-upload text-primary me-1"></i>
                                        Currículo (PDF, DOC, DOCX)
                                    </label>
                                    <div class="position-relative">
                                        <input
                                            type="file" 
                                            class="position-absolute w-100 h-100 opacity-0" 
                                            id="file" 
                                            name="file" 
                                            @change="handleFileChange"
                                            accept=".pdf,.doc,.docx"
                                            style="z-index: 2; cursor: pointer;"
                                        >
                                        <div 
                                            class="border border-2 border-dashed p-4 text-center" 
                                            style="border-radius: 12px; border-color: #6f42c1 !important; background: rgba(111, 66, 193, 0.05); cursor: pointer; transition: all 0.3s ease;"
                                            @mouseover="$event.target.style.background = 'rgba(111, 66, 193, 0.1)'"
                                            @mouseleave="$event.target.style.background = 'rgba(111, 66, 193, 0.05)'"
                                        >
                                            <i class="bi bi-cloud-arrow-up text-primary" style="font-size: 2rem;"></i>
                                            <p class="mb-1 fw-semibold text-primary">
                                                {{ selectedFileName || 'Clique para selecionar seu currículo' }}
                                            </p>
                                            <small class="text-muted">PDF, DOC ou DOCX até 1MB</small>
                                        </div>
                                    </div>
                                    <div class="text-danger mt-1 small" v-if="page.props.errors.file">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        {{ page.props.errors.file[0] }}
                                    </div>
                                </div>

                                <!-- Botão de envio -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg px-5 py-3 fw-bold text-white" :disabled="is_loading" style="background: linear-gradient(135deg, #6f42c1 0%, #007bff 100%); border: none; border-radius: 50px; text-transform: uppercase; letter-spacing: 1px;">
                                        <i class="bi bi-send me-2"></i>
                                        {{ is_loading ? 'Enviando...' : 'Enviar Currículo' }}
                                    </button>
                                    <div class="text-danger mt-2 small" v-if="page.props.errors.submit">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        {{ page.props.errors.submit[0] }}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import { usePage } from '@inertiajs/vue3';
import { watch, ref } from 'vue';
import { router } from '@inertiajs/vue3';
import AlertMessage from './Components/AlertMessage.vue';

const page = usePage();
const is_loading = ref(false);
const selectedFileName = ref('');

const form = {
    name: '',
    email: '',
    phone: '',
    desired_job: '',
    education: '',
    observations: '',
    file: '',
}

// watch errors
watch(page.props.errors, (newErrors) => {
    console.log('Errors:', newErrors);
});

const handleFileChange = (e) => {
    const file = e.target.files[0];
    if (file) {
        form.file = file;
        selectedFileName.value = file.name;
    } else {
        form.file = '';
        selectedFileName.value = '';
    }
}

const resetForm = () => {
    Object.keys(form).forEach(key => form[key] = '');
    selectedFileName.value = '';

    // Limpar o input de arquivo completamente
    const fileInput = document.getElementById('file');
    fileInput.value = null;

}

const submit = () => {
    is_loading.value = true;
    router.post('/resume/store', form, 
        {
            onSuccess: () => {
                is_loading.value = false;
                // Limpar formulário após sucesso
                resetForm();
            },
            onError: () => {
                is_loading.value = false;
            }
        }
    );
}

</script>