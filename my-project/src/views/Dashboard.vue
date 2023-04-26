<template>
  <div>
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            ID
          </th>
          <th
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Name
          </th>
          <th
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Children
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr v-for="(item, index) in items" :key="index">
          <td class="px-6 py-4 whitespace-nowrap">{{ item.id }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ item.name }}</td>
          <td class="px-6 py-4 whitespace-nowrap">
            <table class="min-w-full divide-y divide-gray-200">
              <tbody class="bg-white divide-y divide-gray-200">
                <tr
                  v-for="(child, childIndex) in item.children"
                  :key="childIndex"
                >
                  <td class="px-6 py-4 whitespace-nowrap">{{ child.id }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">{{ child.name }}</td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [
        {
          id: 1,
          name: 'Parent 1',
          children: [
            {
              id: 1,
              name: 'Child 1-1',
            },
            {
              id: 2,
              name: 'Child 1-2',
            },
          ],
        },
        {
          id: 2,
          name: 'Parent 2',
          children: [
            {
              id: 1,
              name: 'Child 2-1',
            },
            {
              id: 2,
              name: 'Child 2-2',
            },
          ],
        },
      ],
    }
  },
}
</script>
