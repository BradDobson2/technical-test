import { ChartBarIcon, IdentificationIcon } from "@heroicons/react/24/outline";
import { useSelector } from "react-redux";

export default function InspectionComponent({ component, inspection }) {
  const componentType = useSelector(
    (state) =>
      state.componentTypes.find(
        (componentType) => componentType.id === component.component_type_id
      ).type
  );

  const inspectionComponent = inspection.inspection_components.find(
    (inspectionComponent) => inspectionComponent.component_id === component.id
  );

  const componentGrade = useSelector((state) =>
    state.componentGrades.find(
      (componentGrade) =>
        componentGrade.id === inspectionComponent.component_grade_id
    )
  );

  return (
    <>
      <div className="mt-6 flex w-full flex-none gap-x-4 border-t border-gray-900/5 pt-6">
        <h3 className="text-base font-semibold leading-7 text-gray-900">
          {componentType}
        </h3>
      </div>

      <div className="mt-4 flex w-full flex-none gap-x-4">
        <dt className="flex-none">
          <IdentificationIcon
            className="h-6 w-5 text-gray-400"
            aria-hidden="true"
          />
        </dt>
        <dd className="text-sm font-medium leading-6 text-gray-900">
          {component.serial_number}
        </dd>
      </div>

      <div className="mt-4 flex w-full flex-none gap-x-4">
        <dt className="flex-none">
          <ChartBarIcon className="h-6 w-5 text-gray-400" aria-hidden="true" />
        </dt>
        <dd className="text-sm font-medium leading-6 text-gray-900">
          {`${componentGrade.grade} (${componentGrade.description})`}
        </dd>
      </div>

      <div className="mt-4 flex w-full flex-none gap-x-4">
        <img src={inspectionComponent.image_url} />
      </div>
    </>
  );
}
