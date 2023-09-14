export default async function initialState() {
  const user = JSON.parse(localStorage.getItem("user"));
  return user ?? null;
}
