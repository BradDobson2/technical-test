import { idle, inProgress, fulfilled, rejected } from "../../request-statuses";

export default function reducer(login = idle, action) {
  switch (action.type) {
    case "login/pending":
      return inProgress;
    case "login/fulfilled":
      return fulfilled;
    case "login/rejected":
      return rejected;
    default:
      return login;
  }
}
