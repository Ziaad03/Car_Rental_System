import "../../../styles/carform.css";

export default function AddCarForm() {
  const handleSubmit = (e) => {
    e.preventDefault();
    // Logic to add car
  };

  return (
    <div>
      <h3 className="text-lg font-semibold mb-2">Add New Car</h3>
      <form className=" car-form space-y-4" onSubmit={handleSubmit}>
        <input
          type="text"
          placeholder="Model"
          className="w-full p-2 border rounded"
          id="model-input"
        />
        <input
          type="text"
          placeholder="Year"
          className="w-full p-2 border rounded"
        />
        <input
          type="text"
          placeholder="Plate ID"
          className="w-full p-2 border rounded"
        />
        <select className="w-full p-2 border rounded">
          <option value="active">Active</option>
          <option value="out-of-service">Out of Service</option>
          <option value="rented">Rented</option>
        </select>
        <button
          type="submit"
          className="w-full bg-blue-600 text-white py-2 rounded"
        >
          Save Car
        </button>
      </form>
    </div>
  );
}
