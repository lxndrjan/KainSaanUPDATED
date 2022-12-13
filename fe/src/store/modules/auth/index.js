import API from "../../base/";

const auth = {
  namespaced: true,
  state() {
    return {
      user: {},
      token: localStorage.getItem("auth") || "",
      role: localStorage.getItem("role") || "",
    };
  },
  mutations: {
    SET_ACC(state, data) {
      state.user = data;
      const bearer_token = localStorage.getItem("auth") || "";
      API.defaults.headers.common["Authorization"] = `Bearer ${bearer_token}`;
    },
    SET_TOKEN(state, token) {
      state.token = token;
      localStorage.setItem("auth", token);
    },
    SET_ROLE(state, role) {
      state.role = role;
      localStorage.setItem("role", role);
    },
    SET_ADMINISTRATOR() {
      localStorage.setItem("isAdmin", true);
    },
    SET_USER() {
      localStorage.setItem("isUser", true);
    },
    UNSET_USER(state) {
      localStorage.removeItem("auth");
      localStorage.removeItem("role");
      localStorage.removeItem("isAdmin");
      localStorage.removeItem("isUser");
      state.token = "";
      state.role = "";
      API.defaults.headers.common["Authorization"] = "";
    },
  },
  actions: {
    async login({ commit }, data) {
      const res = await API.post("/auth/login", data)
        .then((res) => {
          commit("SET_TOKEN", res.data.access_token);
          res.data.role == "Admin"
            ? commit("SET_ADMINISTRATOR") && commit("SET_ROLE", res.data.role)
            : res.data.role == "User"
            ? commit("SET_USER") && commit("SET_ROLE", res.data.role)
            : null;
          return res;
        })
        .catch((err) => {
          return err.response;
        });
      return res;
    },
    async register({ commit }, data) {
      const res = await API.post("/auth/register", data)
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async me({ commit }) {
      const res = await API.get(
        "/auth/me?token=" + localStorage.getItem("auth")
      )
        .then((response) => {
          commit("SET_ACC", response.data);
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async allFoodEstablishments({ commit }, { page, keyword }) {
      const res = await API.get(
        `/auth/all-food-establishments?page=${page}&keyword=${keyword}`
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async allFoodEstablishmentsMap({ commit }) {
      const res = await API.get(`/auth/map-all-food-establishments`)
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async allFavorites({ commit }) {
      const res = await API.get(
        "/auth/all-favorites?token=" + localStorage.getItem("auth")
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },

    async allTrending({ commit }) {
      const res = await API.get(
        "/auth/all-trending?token=" + localStorage.getItem("auth")
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async allRecommended({ commit }, { page, keyword }) {
      const res = await API.get(
        `/auth/all-recommended?page=${page}&keyword=${keyword}`
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },

    async getFoodEstablishmentInfo({ commit }, id) {
      const res = await API.get(
        `/auth/food-establishment/${id}?token=` + localStorage.getItem("auth")
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async getMyFavorites({ commit }, id) {
      const res = await API.get(
        `/auth/my-favorite/${id}?token=` + localStorage.getItem("auth")
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async getVisited({ commit }) {
      const res = await API.get(
        `/auth/visited?token=` + localStorage.getItem("auth")
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },

    async addReview({ commit }, { data, id }) {
      const res = await API.post(
        `/auth/add-review/${id}?token=` + localStorage.getItem("auth"),
        data
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async addFood({ commit }, data) {
      const res = await API.post(
        "/auth/add-food?token=" + localStorage.getItem("auth"),
        data
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async addNewFood({ commit }, data) {
      const res = await API.post(
        "/auth/add-new-food?token=" + localStorage.getItem("auth"),
        data
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async addFoodEstablishment({ commit }, data) {
      const res = await API.post(
        "/auth/add-food-establishment?token=" + localStorage.getItem("auth"),
        data
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async addFoodEstablishmentImage({ commit }, { data, id }) {
      const res = await API.post(
        `/auth/add-food-establishment-image/${id}?token=` +
          localStorage.getItem("auth"),
        data
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async updateFoodEstablishment({ commit }, { data, id }) {
      const res = await API.put(
        `/auth/update-food-establishment/${id}?token=` +
          localStorage.getItem("auth"),
        data
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async updateFoodEstablishmentImage({ commit }, { data, id }) {
      const res = await API.post(
        `/auth/update-food-establishment-image/${id}?token=` +
          localStorage.getItem("auth"),
        data
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async updateFoodInfo({ commit }, { data, id }) {
      const res = await API.put(
        `/auth/update-food-info/${id}?token=` + localStorage.getItem("auth"),
        data
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async updateFoodImage({ commit }, { data, id }) {
      const res = await API.post(
        `/auth/update-food-image/${id}?token=` + localStorage.getItem("auth"),
        data
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async addViews({ commit }, id) {
      const res = await API.post(
        `/auth/add-views/${id}?token=` + localStorage.getItem("auth")
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async addToFavorites({ commit }, id) {
      const res = await API.post(
        `/auth/add-to-favorites/${id}?token=` + localStorage.getItem("auth")
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async removeToFavorites({ commit }, id) {
      const res = await API.delete(
        `/auth/remove-to-favorites/${id}?token=` + localStorage.getItem("auth")
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async deleteFood({ commit }, id) {
      const res = await API.delete(
        `/auth/delete-food/${id}?token=` + localStorage.getItem("auth")
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async addFoodImages({ commit }, { data, id }) {
      const res = await API.post(
        `/auth/add-food-image/${id}?token=` + localStorage.getItem("auth"),
        data
      )
        .then((response) => {
          return response;
        })
        .catch((error) => {
          return error.response;
        });
      return res;
    },
    async logout({ commit }) {
      const res = await API.post(
        "/auth/logout?token=" + localStorage.getItem("auth")
      )
        .then((response) => {
          commit("UNSET_USER");
          return response;
        })
        .catch((error) => {
          console.log(error.response);
          return error.response;
        });
      return res;
    },
  },
};
export default auth;
