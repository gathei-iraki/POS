import React, { useState, useEffect } from 'react';
import styled from 'styled-components';

const Form = styled.form`
  display: flex;
  flex-direction: column;
  max-width: 300px;
  margin: auto;
`;

const Input = styled.input`
  margin: 10px 0;
  padding: 10px;
  font-size: 16px;
`;

const Select = styled.select`
  margin: 10px 0;
  padding: 10px;
  font-size: 16px;
`;

const Button = styled.button`
  padding: 10px;
  font-size: 16px;
  background-color: blue;
  color: white;
  border: none;
  cursor: pointer;
`;

function ProductForm() {
  const [categories, setCategories] = useState([]);
  const [units, setUnits] = useState([]);
  const [taxTypes, setTaxTypes] = useState([]);

  useEffect(() => {
    // Fetch categories from backend
    fetch('http://localhost/POS/get_categories.php')
      .then((response) => response.json())
      .then((data) => setCategories(data));

    // Fetch units from backend
    fetch('http://localhost/POS/get_units.php')
      .then((response) => response.json())
      .then((data) => setUnits(data));

    // Fetch tax types from backend
    fetch('http://localhost/POS/get_tax_types.php')
      .then((response) => response.json())
      .then((data) => setTaxTypes(data));
  }, []);

  return (
    <Form method="POST" action="http://localhost/POS/addtoinv.php">
      <label htmlFor="product_name">Name</label>
      <Input type="text" id="product_name" name="product_name" placeholder="Enter name" />

      <label htmlFor="category">Category</label>
      <Select id="category" name="category_name">
        <option value="">--Select a Category--</option>
        {categories.map((category, index) => (
          <option key={index} value={category.category_name}>
            {category.category_name}
          </option>
        ))}
      </Select>

      <label htmlFor="unit">Unit</label>
      <Select id="unit" name="unit_name">
        <option value="">--Select a Unit--</option>
        {units.map((unit, index) => (
          <option key={index} value={unit.unit_name}>
            {unit.unit_name}
          </option>
        ))}
      </Select>

      <label htmlFor="tax_type">Tax type</label>
      <Select id="tax_type" name="tax_type">
        <option value="">--Select tax type--</option>
        {taxTypes.map((taxType, index) => (
          <option key={index} value={taxType.tax_name}>
            {taxType.tax_name}
          </option>
        ))}
      </Select>

      <label htmlFor="color">Color</label>
      <Select name="color" id="color">
        <option value="">--Select Color--</option>
        <option value="red">Red</option>
        <option value="blue">Blue</option>
        <option value="black">Black</option>
        <option value="maroon">Maroon</option>
      </Select>

      <label htmlFor="serial">Serial</label>
      <Input type="text" id="serial" name="serial" placeholder="SKU/Serial/Barcode etc" />

      <label htmlFor="reorder_level">Reorder Level</label>
      <Input type="text" id="reorder_level" name="reorder_level" />

      <label htmlFor="availability">Availability</label>
      <Input type="text" id="availability" name="availability" />

      <label htmlFor="quantity_predefined">Quantity Predefined</label>
      <Input type="text" id="quantity_predefined" name="quantity_predefined" />

      <label htmlFor="class">Class</label>
      <Input type="text" id="class" name="class" />

      <label htmlFor="buying_price">Unit Buying Price</label>
      <Input type="text" id="buying_price" name="buying_price" />

      <label htmlFor="markup_percentage">Markup Percentage</label>
      <Input type="text" id="markup_percentage" name="markup_percentage" />

      <label htmlFor="marked_price">Marked Price</label>
      <Input type="text" id="marked_price" name="marked_price" />

      <label htmlFor="opening_stock">Opening Stock</label>
      <Input type="text" id="opening_stock" name="opening_stock" />

      <label htmlFor="narrative">Narrative</label>
      <Input type="text" id="narrative" name="narrative" />

      <label htmlFor="active">Active</label>
      <Input type="text" id="active" name="active" />

      <Button type="submit">Submit</Button>
    </Form>
  );
}

export default ProductForm;
