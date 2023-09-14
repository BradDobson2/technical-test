import { idle, inProgress, fulfilled, rejected } from "../../request-statuses";

export default function reducer(fetchWindFarm = idle, action) {
  switch (action.type) {
    case "fetchWindFarm/pending":
      return inProgress;
    case "fetchWindFarm/fulfilled":
      return fulfilled;
    case "fetchWindFarm/rejected":
      return rejected;
    default:
      return fetchWindFarm;
  }
}
