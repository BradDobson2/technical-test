export default function reducer(user = null, action) {
  switch (action.type) {
    case "login/fulfilled":
      return action.payload;
    case "logout/fulfilled":
      return null;
    default:
      return user;
  }
}
