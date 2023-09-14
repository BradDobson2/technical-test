export default function initialState() {
  const user = JSON.parse(localStorage.getItem("user"));
  return user ?? null;
}
