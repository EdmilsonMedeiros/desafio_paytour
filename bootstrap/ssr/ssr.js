import { unref, useSSRContext, mergeProps, ref, watch, onMounted, createSSRApp, h } from "vue";
import { ssrInterpolate, ssrRenderAttrs, ssrRenderComponent, ssrRenderAttr, ssrRenderList, ssrRenderClass, ssrIncludeBooleanAttr, ssrLooseContain, ssrLooseEqual } from "vue/server-renderer";
import { usePage, useForm, createInertiaApp } from "@inertiajs/vue3";
import axios from "axios";
import createServer from "@inertiajs/vue3/server";
import { renderToString } from "@vue/server-renderer";
const _sfc_main$3 = {
  __name: "AlertMessage",
  __ssrInlineRender: true,
  setup(__props) {
    const page = usePage();
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      if (unref(page).props.error.length > 0) {
        _push(`<div class="mt-2 alert alert-danger"><span class="text-danger">${ssrInterpolate(unref(page).props.error)}</span></div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(page).props.success.length > 0) {
        _push(`<div class="mt-2 alert alert-success"><span class="text-success">${ssrInterpolate(unref(page).props.success)}</span></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Components/AlertMessage.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const __vite_glob_0_1 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: _sfc_main$3
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$2 = {
  __name: "Login",
  __ssrInlineRender: true,
  setup(__props) {
    const page = usePage();
    const form = useForm({
      email: "",
      password: ""
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "container" }, _attrs))}><div class="row"><div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-xs-12 mt-5"><div class="card"><div class="card-header"><h1 class="text-start text-dark">Login</h1>`);
      _push(ssrRenderComponent(_sfc_main$3, null, null, _parent));
      _push(`</div><div class="card-body"><form action=""><div class="mb-3"><label for="email" class="form-label"><span class="bi bi-envelope"></span> Email</label><input type="email" class="form-control form-control-lg" id="email" name="email"${ssrRenderAttr("value", unref(form).email)}>`);
      if (unref(page).props.errors.email) {
        _push(`<span class="text-danger">${ssrInterpolate(unref(page).props.errors.email[0])}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-3"><label for="password" class="form-label"><span class="bi bi-key"></span> Password</label><input type="password" class="form-control form-control-lg" id="password" name="password"${ssrRenderAttr("value", unref(form).password)}>`);
      if (unref(page).props.errors.password) {
        _push(`<span class="text-danger">${ssrInterpolate(unref(page).props.errors.password[0])}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="d-flex gap-1 justify-content-end"><button type="button" class="btn btn-primary">Login</button></div></form></div></div></div></div></div>`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Auth/Login.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const __vite_glob_0_0 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: _sfc_main$2
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$1 = {
  __name: "Index",
  __ssrInlineRender: true,
  setup(__props) {
    const page = usePage();
    const resumes = ref([]);
    const page_number = ref(1);
    const search = ref("");
    const per_page = ref(10);
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
      axios.post(
        "/admin/get-resumes",
        { per_page: per_page.value, page: page_number.value, search: search.value }
      ).then((response) => {
        resumes.value = response.data;
        page_number.value = response.data.current_page;
        total_pages.value = response.data.last_page;
        total_items.value = response.data.total;
      }).catch((error) => {
        console.log("error", error);
      });
    };
    onMounted(() => {
      getResumes();
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "container-fluid" }, _attrs))}><div class="d-flex justify-content-between align-items-center"><h1>Bem vindo ${ssrInterpolate(unref(page).props.user.name)}</h1><button class="btn btn-danger">SAIR</button></div><div class="row mt-5"><div class="col-12 mb-3"><h3 class="text-start text-dark fs-4">Candidaturas Recebidas</h3></div><div class="input-group mb-3 col-md-4 col-sm-12 col-xs-12"><span class="input-group-text" id="search-icon"><i class="bi bi-search"></i></span><input type="text" class="form-control px-4"${ssrRenderAttr("value", search.value)} placeholder="Pesquisar" aria-label="Pesquisar" aria-describedby="search-icon"></div><div class="col-12">`);
      if (unref(page).props.error.length > 0) {
        _push(`<div class="alert alert-danger">${ssrInterpolate(unref(page).props.error)}</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(page).props.success.length > 0) {
        _push(`<div class="alert alert-success">${ssrInterpolate(unref(page).props.success)}</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<table class="table"><thead><tr><th>Nome</th><th>Email</th><th>Telefone</th><th>Cargo Desejado</th></tr></thead><tbody><!--[-->`);
      ssrRenderList(resumes.value.data, (resume) => {
        _push(`<tr><td>${ssrInterpolate(resume.name)}</td><td>${ssrInterpolate(resume.email)}</td><td>${ssrInterpolate(resume.phone)}</td><td>${ssrInterpolate(resume.desired_job)}</td></tr>`);
      });
      _push(`<!--]--></tbody></table><div class="d-flex justify-content-between align-items-center"><div class="d-flex justify-content-between align-items-center"><button class="${ssrRenderClass(page_number.value == 1 ? "btn btn-secondary disabled" : "btn btn-primary")}">Anterior</button></div><div class="d-flex justify-content-between align-items-center"><button class="${ssrRenderClass(page_number.value == total_pages.value ? "btn btn-secondary disabled" : "btn btn-primary")}">Próximo</button></div></div></div></div></div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Dashboard/Index.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const __vite_glob_0_2 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: _sfc_main$1
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main = {
  __name: "Index",
  __ssrInlineRender: true,
  setup(__props) {
    const page = usePage();
    const form = {
      name: "",
      email: "",
      phone: "",
      desired_job: "",
      education: "",
      observations: ""
    };
    watch(page.props.errors, (newErrors) => {
      console.log("Errors:", newErrors);
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "container" }, _attrs))}><div class="row"><div class="col-12 d-flex justify-content-between align-items-center mt-2"><div><h1 class="text-start text-dark fs-4">Bem vindo</h1></div><div class="d-flex gap-1 justify-content-end"><a href="/admin/login" class="btn btn"> Login como Admin <span class="bi bi-key"></span></a></div></div></div><div class="row"><div class="col-12 form-resume"><p>Preencha o formulário abaixo para enviar seu currículo</p>`);
      if (unref(page).props.success.length > 0) {
        _push(`<div class="alert alert-success">${ssrInterpolate(unref(page).props.success)}</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(page).props.error.length > 0) {
        _push(`<div class="alert alert-danger">${ssrInterpolate(unref(page).props.error)}</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="mb-3"><label for="name" class="form-label">Nome</label><input type="text" class="form-control" id="name" name="name"${ssrRenderAttr("value", form.name)}>`);
      if (unref(page).props.errors.name) {
        _push(`<span class="text-danger">${ssrInterpolate(unref(page).props.errors.name[0])} <span class="bi bi-exclamation-triangle"></span></span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-3"><label for="email" class="form-label">Email</label><input type="email" class="form-control" id="email" name="email"${ssrRenderAttr("value", form.email)}>`);
      if (unref(page).props.errors.email) {
        _push(`<span class="text-danger">${ssrInterpolate(unref(page).props.errors.email[0])} <span class="bi bi-exclamation-triangle"></span></span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-3"><label for="phone" class="form-label">Telefone</label><input type="tel" class="form-control" id="phone" name="phone"${ssrRenderAttr("value", form.phone)}>`);
      if (unref(page).props.errors.phone) {
        _push(`<span class="text-danger">${ssrInterpolate(unref(page).props.errors.phone[0])} <span class="bi bi-exclamation-triangle"></span></span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-3"><label for="desired_job" class="form-label">Cargo Desejado</label><input type="text" class="form-control" id="desired_job" name="desired_job"${ssrRenderAttr("value", form.desired_job)}>`);
      if (unref(page).props.errors.desired_job) {
        _push(`<span class="text-danger">${ssrInterpolate(unref(page).props.errors.desired_job[0])} <span class="bi bi-exclamation-triangle"></span></span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-3"><label for="education" class="form-label">Escolaridade</label><select class="form-select" id="education" name="education"><option value="Ensino Fundamental"${ssrIncludeBooleanAttr(Array.isArray(form.education) ? ssrLooseContain(form.education, "Ensino Fundamental") : ssrLooseEqual(form.education, "Ensino Fundamental")) ? " selected" : ""}>Ensino Fundamental</option><option value="Ensino Médio"${ssrIncludeBooleanAttr(Array.isArray(form.education) ? ssrLooseContain(form.education, "Ensino Médio") : ssrLooseEqual(form.education, "Ensino Médio")) ? " selected" : ""}>Ensino Médio</option><option value="Ensino Superior"${ssrIncludeBooleanAttr(Array.isArray(form.education) ? ssrLooseContain(form.education, "Ensino Superior") : ssrLooseEqual(form.education, "Ensino Superior")) ? " selected" : ""}>Ensino Superior</option></select>`);
      if (unref(page).props.errors.education) {
        _push(`<span class="text-danger">${ssrInterpolate(unref(page).props.errors.education[0])} <span class="bi bi-exclamation-triangle"></span></span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-3"><label for="observations" class="form-label">Observações</label><textarea class="form-control" id="observations" name="observations">${ssrInterpolate(form.observations)}</textarea>`);
      if (unref(page).props.errors.observations) {
        _push(`<span class="text-danger">${ssrInterpolate(unref(page).props.errors.observations[0])} <span class="bi bi-exclamation-triangle"></span></span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-3"><label for="file" class="form-label">Arquivo</label><input type="file" class="form-control" id="file" name="file">`);
      if (unref(page).props.errors.file) {
        _push(`<span class="text-danger">${ssrInterpolate(unref(page).props.errors.file[0])} <span class="bi bi-exclamation-triangle"></span></span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="d-flex gap-1 justify-content-end"></div><button type="submit" class="btn btn-primary">Enviar</button>`);
      if (unref(page).props.errors.submit) {
        _push(`<span class="text-danger">${ssrInterpolate(unref(page).props.errors.submit[0])} <span class="bi bi-exclamation-triangle"></span></span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Index.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const __vite_glob_0_3 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: _sfc_main
}, Symbol.toStringTag, { value: "Module" }));
createServer(
  (page) => createInertiaApp({
    page,
    render: renderToString,
    resolve: (name) => {
      const pages = /* @__PURE__ */ Object.assign({ "./Pages/Auth/Login.vue": __vite_glob_0_0, "./Pages/Components/AlertMessage.vue": __vite_glob_0_1, "./Pages/Dashboard/Index.vue": __vite_glob_0_2, "./Pages/Index.vue": __vite_glob_0_3 });
      return pages[`./Pages/${name}.vue`];
    },
    setup({ App, props, plugin }) {
      return createSSRApp({
        render: () => h(App, props)
      }).use(plugin);
    }
  }),
  { client: true }
);
