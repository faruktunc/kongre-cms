> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Import action

export const UtilityInjection = ({extras, except, set, version, children}) => {
  const parsedExtras = (extras ?? '').split('||').filter(extra => extra !== '').map(extra => {
    const [name, type, parameter, description] = extra.split(';;');
    return {
      name,
      type,
      parameter,
      description
    };
  });
  const utilitySets = {
    '5.x': {
      actions: [{
        name: 'Action',
        type: 'Filament\\Actions\\Action',
        parameter: '$action',
        description: 'The current action instance.'
      }, {
        name: 'Arguments',
        type: 'array<string, mixed>',
        parameter: '$arguments',
        description: 'The array of arguments passed to the action when it was triggered.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: "The array of data submitted from form fields in the action's modal. It will be empty before the modal form is submitted."
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action, if one is attached.'
      }, {
        name: 'Selected Eloquent records',
        type: 'Illuminate\\Support\\Collection',
        parameter: '$selectedRecords',
        description: '[Bulk actions only] The Eloquent records selected in the table.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Actions in schemas only] The schema object that this action belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Actions in schemas only] The schema component that this action belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Actions in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema set function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Set',
        parameter: '$schemaSet',
        description: '[Actions in schemas only] A function for setting values in the schema data.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Actions in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Actions in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Actions in schemas only] The current value of the schema that this action belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Actions in tables only] The table object that this action belongs to.'
      }],
      actionGroups: [{
        name: 'Action group',
        type: 'Filament\\Actions\\ActionGroup',
        parameter: '$group',
        description: 'The current action group instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action group, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action group, if one is attached.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Action groups in schemas only] The schema object that this action group belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Action groups in schemas only] The schema component that this action group belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Action groups in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Action groups in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Action groups in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Action groups in schemas only] The current value of the schema that this action group belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Action groups in tables only] The table object that this action group belongs to.'
      }],
      formFields: [{
        name: 'Field',
        type: 'Filament\\Forms\\Components\\Field',
        parameter: '$component',
        description: 'The current field component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current form data. Validation is not run.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Raw state',
        type: 'mixed',
        parameter: '$rawState',
        description: 'The current value of the field, before state casts were applied. Validation is not run.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the field. Validation is not run.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      exportColumns: [{
        name: 'Export column',
        type: 'Filament\\Actions\\Exports\\ExportColumn',
        parameter: '$column',
        description: 'The current export column instance.'
      }, {
        name: 'Exporter',
        type: '?Filament\\Actions\\Exports\\Exporter',
        parameter: '$exporter',
        description: 'The instance of the exporter class that is currently being used for exporting data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the export started.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being exported.'
      }],
      importColumns: [{
        name: 'Import column',
        type: 'Filament\\Actions\\Imports\\ImportColumn',
        parameter: '$column',
        description: 'The current import column instance.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: 'The processed data for the record that is currently being imported.'
      }, {
        name: 'Importer',
        type: '?Filament\\Actions\\Imports\\Importer',
        parameter: '$importer',
        description: 'The instance of the importer class that is currently being used for importing data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the import started.'
      }, {
        name: 'Original data',
        type: 'array<string, mixed>',
        parameter: '$originalData',
        description: 'The original data for the record that is currently being imported, before it was processed.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being imported.'
      }],
      infolistEntries: [{
        name: 'Entry',
        type: 'Filament\\Infolists\\Components\\Entry',
        parameter: '$component',
        description: 'The current entry component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the entry.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      schemaComponents: [{
        name: 'Component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$component',
        description: 'The current component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      tableColumns: [{
        name: 'Column',
        type: 'Filament\\Tables\\Columns\\Column',
        parameter: '$column',
        description: 'The current column instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Row loop',
        type: 'stdClass',
        parameter: '$rowLoop',
        description: 'The <a href="https://laravel.com/docs/blade#the-loop-variable" target="_blank">row loop</a> object for the current table row.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the column, based on the current table row.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current table row.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }],
      tableFilters: [{
        name: 'Filter',
        type: 'Filament\\Tables\\Filters\\BaseFilter',
        parameter: '$filter',
        description: 'The current filter instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }]
    },
    '4.x': {
      actions: [{
        name: 'Action',
        type: 'Filament\\Actions\\Action',
        parameter: '$action',
        description: 'The current action instance.'
      }, {
        name: 'Arguments',
        type: 'array<string, mixed>',
        parameter: '$arguments',
        description: 'The array of arguments passed to the action when it was triggered.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: "The array of data submitted from form fields in the action's modal. It will be empty before the modal form is submitted."
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action, if one is attached.'
      }, {
        name: 'Selected Eloquent records',
        type: 'Illuminate\\Support\\Collection',
        parameter: '$selectedRecords',
        description: '[Bulk actions only] The Eloquent records selected in the table.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Actions in schemas only] The schema object that this action belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Actions in schemas only] The schema component that this action belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Actions in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema set function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Set',
        parameter: '$schemaSet',
        description: '[Actions in schemas only] A function for setting values in the schema data.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Actions in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Actions in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Actions in schemas only] The current value of the schema that this action belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Actions in tables only] The table object that this action belongs to.'
      }],
      actionGroups: [{
        name: 'Action group',
        type: 'Filament\\Actions\\ActionGroup',
        parameter: '$group',
        description: 'The current action group instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action group, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action group, if one is attached.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Action groups in schemas only] The schema object that this action group belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Action groups in schemas only] The schema component that this action group belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Action groups in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Action groups in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Action groups in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Action groups in schemas only] The current value of the schema that this action belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Action groups in tables only] The table object that this action group belongs to.'
      }],
      formFields: [{
        name: 'Field',
        type: 'Filament\\Forms\\Components\\Field',
        parameter: '$component',
        description: 'The current field component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current form data. Validation is not run.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Raw state',
        type: 'mixed',
        parameter: '$rawState',
        description: 'The current value of the field, before state casts were applied. Validation is not run.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the field. Validation is not run.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      exportColumns: [{
        name: 'Export column',
        type: 'Filament\\Actions\\Exports\\ExportColumn',
        parameter: '$column',
        description: 'The current export column instance.'
      }, {
        name: 'Exporter',
        type: '?Filament\\Actions\\Exports\\Exporter',
        parameter: '$exporter',
        description: 'The instance of the exporter class that is currently being used for exporting data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the export started.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being exported.'
      }],
      importColumns: [{
        name: 'Import column',
        type: 'Filament\\Actions\\Imports\\ImportColumn',
        parameter: '$column',
        description: 'The current import column instance.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: 'The processed data for the record that is currently being imported.'
      }, {
        name: 'Importer',
        type: '?Filament\\Actions\\Imports\\Importer',
        parameter: '$importer',
        description: 'The instance of the importer class that is currently being used for importing data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the import started.'
      }, {
        name: 'Original data',
        type: 'array<string, mixed>',
        parameter: '$originalData',
        description: 'The original data for the record that is currently being imported, before it was processed.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being imported.'
      }],
      infolistEntries: [{
        name: 'Entry',
        type: 'Filament\\Infolists\\Components\\Entry',
        parameter: '$component',
        description: 'The current entry component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the entry.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      schemaComponents: [{
        name: 'Component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$component',
        description: 'The current component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      tableColumns: [{
        name: 'Column',
        type: 'Filament\\Tables\\Columns\\Column',
        parameter: '$column',
        description: 'The current column instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Row loop',
        type: 'stdClass',
        parameter: '$rowLoop',
        description: 'The <a href="https://laravel.com/docs/blade#the-loop-variable" target="_blank">row loop</a> object for the current table row.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the column, based on the current table row.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current table row.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }],
      tableFilters: [{
        name: 'Filter',
        type: 'Filament\\Tables\\Filters\\BaseFilter',
        parameter: '$filter',
        description: 'The current filter instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }]
    }
  };
  const baseUtilities = utilitySets[version]?.[set] || [];
  let utilities = [...parsedExtras, ...baseUtilities].sort((a, b) => a.parameter > b.parameter ? 1 : -1);
  utilities = Array.from(new Map(utilities.map(utility => [utility.parameter, utility])).values());
  const exceptList = (except ?? '').split('||');
  utilities = utilities.filter(utility => !exceptList.includes(utility.parameter));
  const links = {
    actions: `/${version}/actions/overview#action-utility-injection`,
    actionGroups: `/${version}/actions/overview#action-utility-injection`,
    formFields: `/${version}/forms/overview#field-utility-injection`,
    infolistEntries: `/${version}/infolists/overview#entry-utility-injection`,
    schemaComponents: `/${version}/schemas/overview#component-utility-injection`,
    tableColumns: `/${version}/tables/columns/overview#column-utility-injection`,
    tableFilters: `/${version}/tables/filters/overview#filter-utility-injection`
  };
  const link = links[set] ?? null;
  const parseInlineCode = text => {
    if (typeof text !== 'string') return text;
    const parts = text.split(/(`[^`]+`)/);
    return parts.map((part, i) => {
      if (part.startsWith('`') && part.endsWith('`')) {
        return <code key={i} className="rounded bg-gray-100 px-1 py-0.5 font-mono text-xs dark:bg-white/10">
            {part.slice(1, -1)}
          </code>;
      }
      return part;
    });
  };
  return <details className="border-standard mt-4 rounded-xl">
      <summary className="not-prose flex w-full cursor-pointer list-none flex-row content-center items-start rounded-t-xl rounded-b-xl px-3.5 py-3 text-sm text-gray-600 hover:bg-white/20 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-gray-200 [&::-webkit-details-marker]:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" className="mt-0.5 h-3.5 w-3.5 shrink-0 text-gray-400 transition-transform">
          <path d="m9 18 6-6-6-6" />
        </svg>

        <div className="ml-2 text-left leading-tight">
          {parseInlineCode(children)}
        </div>
      </summary>

      <div className="border-t border-gray-200 px-5 py-3 dark:border-white/10">
        {link && <p className="text-sm">
            <a href={link} target="_blank">
              Learn more about utility injection.
            </a>
          </p>}

        {utilities.map((utility, index) => <div key={index} className="border-b border-gray-200 py-3 last:border-b-0 dark:border-white/10">
            <div className="flex flex-wrap items-center gap-1.5 text-sm">
              <div>{utility.name}</div>
              <div className="text-primary dark:text-primary-light font-semibold">
                {utility.parameter}
              </div>
              <div className="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs text-gray-500 dark:bg-white/10 dark:text-gray-400">
                {utility.type}
              </div>
            </div>
            <div className="mt-1.5 text-sm text-gray-600 dark:text-gray-400" dangerouslySetInnerHTML={{
    __html: utility.description
  }} />
          </div>)}
      </div>
    </details>;
};

export const AutoScreenshot = ({name, alt, version}) => {
  const [loaded, setLoaded] = useState(false);
  return <div className="not-prose border-standard relative mt-4 min-h-10 rounded-2xl">
      <div className={`absolute inset-0 flex items-center px-3.5 py-3 transition-opacity ${loaded ? 'opacity-0' : 'opacity-100'}`}>
        <svg className="h-4 w-4 animate-spin text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4" />
          <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
        </svg>
        <span className="ml-2 text-sm text-gray-600 dark:text-gray-300">
          Loading preview
        </span>
      </div>

      <img src={`/docs/images/${version}/light/${name}.jpg`} alt={alt} loading="lazy" decoding="async" onLoad={() => setLoaded(true)} className={`rounded-2xl transition-opacity dark:hidden ${loaded ? 'opacity-100' : 'opacity-0'}`} />

      <img src={`/docs/images/${version}/dark/${name}.jpg`} alt={alt} loading="lazy" decoding="async" onLoad={() => setLoaded(true)} className={`hidden rounded-2xl transition-opacity dark:block ${loaded ? 'opacity-100' : 'opacity-0'}`} />
    </div>;
};

export const EditOnGitHub = ({version, path}) => {
  const url = `https://github.com/filamentphp/filament/edit/${version}/${path}`;
  return <div className="not-prose mt-16">
      <a href={url} target="_blank" rel="noopener noreferrer" className="inline-flex items-center gap-2 text-sm text-gray-500 transition hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" className="h-4 w-4">
          <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z" />
        </svg>
        Edit this page on GitHub
      </a>
    </div>;
};

export const Footer = () => {
  const sponsorsByTier = JSON.parse(`{
  "agency_partner": [
    {
      "name": "Kirschbaum",
      "url": "https://kirschbaumdevelopment.com/solutions/filament-development",
      "filename": "kirschbaum.svg"
    }
  ],
  "gold": [
    {
      "name": "Agiledrop",
      "url": "https://www.agiledrop.com/laravel?utm_source=filament",
      "filename": "agiledrop.svg"
    },
    {
      "name": "Baiz.ai",
      "url": "https://baiz.ai",
      "filename": "baiz-ai.svg"
    },
    {
      "name": "CMS Max",
      "url": "https://cmsmax.com?ref=filamentphp.com",
      "filename": "cms-max.svg"
    },
    {
      "name": "Mailtrap",
      "url": "https://mailtrap.io/email-sending?utm_source=community&utm_medium=referral&utm_campaign=filament",
      "filename": "mailtrap.svg"
    },
    {
      "name": "SerpApi",
      "url": "https://serpapi.com/?utm_source=filamentphp",
      "filename": "serpapi.svg"
    }
  ]
}`);
  function shuffleArray(items) {
    const result = [...items];
    for (let index = result.length - 1; index > 0; index--) {
      const randomIndex = Math.floor(Math.random() * (index + 1));
      [result[index], result[randomIndex]] = [result[randomIndex], result[index]];
    }
    return result;
  }
  const sponsors = Object.entries(sponsorsByTier).flatMap(([, sponsors]) => shuffleArray(sponsors));
  return <div className="mt-16 flex flex-col gap-4">
      <h2 className="text-center text-2xl font-medium text-gray-800 dark:text-gray-200">
        Sponsored by
      </h2>

      <div className="not-prose flex flex-wrap items-center justify-center gap-5">
        {sponsors.map(sponsor => <a key={sponsor.name} className="footer-sponsor-card" href={sponsor.url} target="_blank" title={sponsor.name}>
            <img src={`/docs/images/sponsors/footer/${sponsor.filename}`} alt={sponsor.name} noZoom />
            <span className="line-pattern-overlay line-pattern-80" />
          </a>)}

        <a href="https://github.com/sponsors/danharrin" target="_blank" className="footer-sponsor-cta">
          <span className="sponsor-cta-content">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
              <path d="M5 12h14" />
              <path d="M12 5v14" />
            </svg>
            <span>Your logo here</span>
          </span>
          <span className="line-pattern-overlay line-pattern-60" />
        </a>
      </div>
    </div>;
};

## Introduction

Filament includes an action that is able to import rows from a CSV. When the trigger button is clicked, a modal asks the user for a file. Once they upload one, they are able to map each column in the CSV to a real column in the database. If any rows fail validation, they will be compiled into a downloadable CSV for the user to review after the rest of the rows have been imported. Users can also download an example CSV file containing all the columns that can be imported.

This feature uses [job batches](https://laravel.com/docs/queues#job-batching) and [database notifications](../notifications/database-notifications), so you need to publish those migrations from Laravel. Also, you need to publish the migrations for tables that Filament uses to store information about imports:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:queue-batches-table
php artisan make:notifications-table
php artisan vendor:publish --tag=filament-actions-migrations
php artisan migrate
```

If you'd like to receive import notifications in a panel, you can enable them in the [panel configuration](../notifications/database-notifications#enabling-database-notifications-in-a-panel).

<Info>
  If you're using PostgreSQL, make sure that the `data` column in the notifications migration is using `json()`: `$table->json('data')`.
</Info>

<Info>
  If you're using UUIDs for your `User` model, make sure that your `notifiable` column in the notifications migration is using `uuidMorphs()`: `$table->uuidMorphs('notifiable')`.
</Info>

You may use the `ImportAction` like so:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Imports\ProductImporter;
use Filament\Actions\ImportAction;

ImportAction::make()
    ->importer(ProductImporter::class)
```

<AutoScreenshot name="actions/import-action/modal" alt="Import action modal" version="5.x" />

If you want to add this action to the header of a table, you may do so like this:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Imports\ProductImporter;
use Filament\Actions\ImportAction;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->headerActions([
            ImportAction::make()
                ->importer(ProductImporter::class)
        ]);
}
```

The ["importer" class needs to be created](#creating-an-importer) to tell Filament how to import each row of the CSV.

If you have more than one `ImportAction` in the same place, you should give each a unique name in the `make()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\ImportAction;

ImportAction::make('importProducts')
    ->importer(ProductImporter::class)

ImportAction::make('importBrands')
    ->importer(BrandImporter::class)
```

## Creating an importer

To create an importer class for a model, you may use the `make:filament-importer` command, passing the name of a model:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-importer Product
```

This will create a new class in the `app/Filament/Imports` directory. You now need to define the [columns](#defining-importer-columns) that can be imported.

### Automatically generating importer columns

If you'd like to save time, Filament can automatically generate the [columns](#defining-importer-columns) for you, based on your model's database columns, using `--generate`:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-importer Product --generate
```

## Defining importer columns

To define the columns that can be imported, you need to override the `getColumns()` method on your importer class, returning an array of `ImportColumn` objects:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

public static function getColumns(): array
{
    return [
        ImportColumn::make('name')
            ->requiredMapping()
            ->rules(['required', 'max:255']),
        ImportColumn::make('sku')
            ->label('SKU')
            ->requiredMapping()
            ->rules(['required', 'max:32']),
        ImportColumn::make('price')
            ->numeric()
            ->rules(['numeric', 'min:0']),
    ];
}
```

### Customizing the label of an import column

The label for each column will be generated automatically from its name, but you can override it by calling the `label()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('sku')
    ->label('SKU')
```

### Requiring an importer column to be mapped to a CSV column

You can call the `requiredMapping()` method to make a column required to be mapped to a column in the CSV. Columns that are required in the database should be required to be mapped:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('sku')
    ->requiredMapping()
```

If you require a column in the database, you also need to make sure that it has a [`rules(['required'])` validation rule](#validating-csv-data).

If a column is not mapped, it will not be validated since there is no data to validate.

If you allow an import to create records as well as [update existing ones](#updating-existing-records-when-importing), but only require a column to be mapped when creating records as it's a required field, you can use the `requiredMappingForNewRecordsOnly()` method instead of `requiredMapping()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('sku')
    ->requiredMappingForNewRecordsOnly()
```

If the `resolveRecord()` method returns a model instance that is not saved in the database yet, the column will be required to be mapped, just for that row. If the user does not map the column, and one of the rows in the import does not yet exist in the database, just that row will fail and a message will be added to the failed rows CSV after every row has been analyzed.

### Validating CSV data

You can call the `rules()` method to add validation rules to a column. These rules will check the data in each row from the CSV before it is saved to the database:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('sku')
    ->rules(['required', 'max:32'])
```

Any rows that do not pass validation will not be imported. Instead, they will be compiled into a new CSV of "failed rows", which the user can download after the import has finished. The user will be shown a list of validation errors for each row that failed.

<UtilityInjection set="importColumns" version="5.x">As well as allowing a static value, the `rules()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Casting state

Before [validation](#validating-csv-data), data from the CSV can be cast. This is useful for converting strings into the correct data type, otherwise validation may fail. For example, if you have a `price` column in your CSV, you may want to cast it to a float:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('price')
    ->castStateUsing(function (string $state): ?float {
        if (blank($state)) {
            return null;
        }
        
        $state = preg_replace('/[^0-9.]/', '', $state);
        $state = floatval($state);
    
        return round($state, precision: 2);
    })
```

<UtilityInjection set="importColumns" version="5.x" extras="State;;mixed;;$state;;The state to cast, after it has been processed by other casting methods.||Original state;;mixed;;$originalState;;The state to cast, before it was processed by other casting methods.">As well as `$state`, the `castStateUsing()` method allows you to inject various utilities into the function as parameters.</UtilityInjection>

In this example, we pass in a function that is used to cast the `$state`. This function removes any non-numeric characters from the string, casts it to a float, and rounds it to two decimal places.

<Info>
  If a column is not [required by validation](#validating-csv-data), and it is empty, it will not be cast.
</Info>

Filament also ships with some built-in casting methods:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('price')
    ->numeric() // Casts the state to a float.

ImportColumn::make('price')
    ->numeric(decimalPlaces: 2) // Casts the state to a float, and rounds it to 2 decimal places.

ImportColumn::make('quantity')
    ->integer() // Casts the state to an integer.

ImportColumn::make('is_visible')
    ->boolean() // Casts the state to a boolean.
```

#### Mutating the state after it has been cast

If you're using a [built-in casting method](#casting-state) or [array cast](#handling-multiple-values-in-a-single-column), you can mutate the state after it has been cast by passing a function to the `castStateUsing()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('price')
    ->numeric()
    ->castStateUsing(function (float $state): ?float {
        if (blank($state)) {
            return null;
        }
    
        return round($state * 100);
    })
```

You can even access the original state before it was cast, by defining an `$originalState` argument in the function:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('price')
    ->numeric()
    ->castStateUsing(function (float $state, mixed $originalState): ?float {
        // ...
    })
```

<UtilityInjection set="importColumns" version="5.x" extras="State;;mixed;;$state;;The state to cast, after it has been processed by other casting methods.||Original state;;mixed;;$originalState;;The state to cast, before it was processed by other casting methods.">As well as `$state`, the `castStateUsing()` method allows you to inject various utilities into the function as parameters.</UtilityInjection>

### Handling multiple values in a single column

You may use the `multiple()` method to cast the values in a column to an array. It accepts a delimiter as its first argument, which is used to split the values in the column into an array. For example, if you have a `documentation_urls` column in your CSV, you may want to cast it to an array of URLs:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('documentation_urls')
    ->multiple(',')
```

<UtilityInjection set="importColumns" version="5.x">As well as allowing a static value, the `multiple()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

In this example, we pass in a comma as the delimiter, so the values in the column will be split by commas, and cast to an array.

#### Casting each item in an array

If you want to cast each item in the array to a different data type, you can chain the [built-in casting methods](#casting-state):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('customer_ratings')
    ->multiple(',')
    ->integer() // Casts each item in the array to an integer.
```

#### Validating each item in an array

If you want to validate each item in the array, you can chain the `nestedRecursiveRules()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('customer_ratings')
    ->multiple(',')
    ->integer()
    ->rules(['array'])
    ->nestedRecursiveRules(['integer', 'min:1', 'max:5'])
```

<UtilityInjection set="importColumns" version="5.x">As well as allowing a static value, the `nestedRecursiveRules()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Importing relationships

You may use the `relationship()` method to import a relationship. At the moment, `BelongsTo` and `BelongsToMany` relationships are supported. For example, if you have a `category` column in your CSV, you may want to import the category `BelongsTo` relationship:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('author')
    ->relationship()
```

In this example, the `author` column in the CSV will be mapped to the `author_id` column in the database. The CSV should contain the primary keys of authors, usually `id`.

If the column has a value, but the author cannot be found, the import will fail validation. Filament automatically adds validation to all relationship columns, to ensure that the relationship is not empty when it is required.

If you want to import a `BelongsToMany` relationship, make sure that the column is set to [`multiple()`](#handling-multiple-values-in-a-single-column), with the correct separator between values:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('authors')
    ->relationship()
    ->multiple(',')
```

#### Customizing the relationship import resolution

If you want to find a related record using a different column, you can pass the column name as `resolveUsing`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('author')
    ->relationship(resolveUsing: 'email')
```

You can pass in multiple columns to `resolveUsing`, and they will be used to find the author, in an "or" fashion. For example, if you pass in `['email', 'username']`, the record can be found by either their email or username:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('author')
    ->relationship(resolveUsing: ['email', 'username'])
```

You can also customize the resolution process, by passing in a function to `resolveUsing`, which should return a record to associate with the relationship:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Author;
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('author')
    ->relationship(resolveUsing: function (string $state): ?Author {
        return Author::query()
            ->where('email', $state)
            ->orWhere('username', $state)
            ->first();
    })
```

<UtilityInjection set="importColumns" version="5.x" extras="State;;mixed;;$state;;The state to resolve into a record.">The function passed to `resolveUsing` allows you to inject various utilities into the function as parameters.</UtilityInjection>

If you are using a `BelongsToMany` relationship, the `$state` will be an array, and you should return a collection of records that you have resolved:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Author;
use Filament\Actions\Imports\ImportColumn;
use Illuminate\Database\Eloquent\Collection;

ImportColumn::make('authors')
    ->relationship(resolveUsing: function (array $state): Collection {
        return Author::query()
            ->whereIn('email', $state)
            ->orWhereIn('username', $state)
            ->get();
    })
```

You could even use this function to dynamically determine which columns to use to resolve the record:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Author;
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('author')
    ->relationship(resolveUsing: function (string $state): ?Author {
        if (filter_var($state, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        }
    
        return 'username';
    })
```

### Marking column data as sensitive

When import rows fail validation, they are logged to the database, ready for export when the import completes. You may want to exclude certain columns from this logging to avoid storing sensitive data in plain text. To achieve this, you can use the `sensitive()` method on the `ImportColumn` to prevent its data from being logged:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('ssn')
    ->label('Social security number')
    ->sensitive()
    ->rules(['required', 'digits:9'])
```

### Customizing how a column is filled into a record

If you want to customize how column state is filled into a record, you can pass a function to the `fillRecordUsing()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Product;
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('sku')
    ->fillRecordUsing(function (Product $record, string $state): void {
        $record->sku = strtoupper($state);
    })
```

<UtilityInjection set="importColumns" version="5.x" extras="State;;mixed;;$state;;The state to fill into the record.">The function passed to the `fillRecordUsing()` method allows you to inject various utilities into the function as parameters.</UtilityInjection>

### Adding helper text below the import column

Sometimes, you may wish to provide extra information for the user before validation. You can do this by adding `helperText()` to a column, which gets displayed below the mapping select:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('skus')
    ->multiple(',')
    ->helperText('A comma-separated list of SKUs.')
```

## Updating existing records when importing

When generating an importer class, you will see this `resolveRecord()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Product;

public function resolveRecord(): ?Product
{
    // return Product::firstOrNew([
    //     // Update existing records, matching them by `$this->data['column_name']`
    //     'email' => $this->data['email'],
    // ]);

    return new Product();
}
```

This method is called for each row in the CSV, and is responsible for returning a model instance that will be filled with the data from the CSV, and saved to the database. By default, it will create a new record for each row. However, you can customize this behavior to update existing records instead. For example, you might want to update a product if it already exists, and create a new one if it doesn't. To do this, you can uncomment the `firstOrNew()` line, and pass the column name that you want to match on. For a product, we might want to match on the `sku` column:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Product;

public function resolveRecord(): ?Product
{
    return Product::firstOrNew([
        'sku' => $this->data['sku'],
    ]);
}
```

### Updating existing records when importing only

If you want to write an importer that only updates existing records, and does not create new ones, you can return `null` if no record is found:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Product;

public function resolveRecord(): ?Product
{
    return Product::query()
        ->where('sku', $this->data['sku'])
        ->first();
}
```

If you'd like to fail the import row if no record is found, you can throw a `RowImportFailedException` with a message:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Product;
use Filament\Actions\Imports\Exceptions\RowImportFailedException;

public function resolveRecord(): ?Product
{
    $product = Product::query()
        ->where('sku', $this->data['sku'])
        ->first();

    if (! $product) {
        throw new RowImportFailedException("No product found with SKU [{$this->data['sku']}].");
    }

    return $product;
}
```

When the import is completed, the user will be able to download a CSV of failed rows, which will contain the error messages.

### Ignoring blank state for an import column

By default, if a column in the CSV is blank, and mapped by the user, and it's not required by validation, the column will be imported as `null` in the database. If you'd like to ignore blank state, and use the existing value in the database instead, you can call the `ignoreBlankState()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('price')
    ->ignoreBlankState()
```

## Using import options

The import action can render extra form components that the user can interact with when importing a CSV. This can be useful to allow the user to customize the behavior of the importer. For instance, you might want a user to be able to choose whether to update existing records when importing, or only create new ones. To do this, you can return options form components from the `getOptionsFormComponents()` method on your importer class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Checkbox;

public static function getOptionsFormComponents(): array
{
    return [
        Checkbox::make('updateExisting')
            ->label('Update existing records'),
    ];
}
```

Alternatively, you can pass a set of static options to the importer through the `options()` method on the action:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Imports\ProductImporter;
use Filament\Actions\ImportAction;

ImportAction::make()
    ->importer(ProductImporter::class)
    ->options([
        'updateExisting' => true,
    ])
```

Now, you can access the data from these options inside the importer class, by calling `$this->options`. For example, you might want to use it inside `resolveRecord()` to [update an existing product](#updating-existing-records-when-importing):

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Product;

public function resolveRecord(): ?Product
{
    if ($this->options['updateExisting'] ?? false) {
        return Product::firstOrNew([
            'sku' => $this->data['sku'],
        ]);
    }

    return new Product();
}
```

## Improving import column mapping guesses

By default, Filament will attempt to "guess" which columns in the CSV match which columns in the database, to save the user time. It does this by attempting to find different combinations of the column name, with spaces, `-`, `_`, all cases insensitively. However, if you'd like to improve the guesses, you can call the `guess()` method with more examples of the column name that could be present in the CSV:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('sku')
    ->guess(['id', 'number', 'stock-keeping unit'])
```

## Providing example CSV data

Before the user uploads a CSV, they have an option to download an example CSV file, containing all the available columns that can be imported. This is useful, as it allows the user to import this file directly into their spreadsheet software, and fill it out.

You can also add an example row to the CSV, to show the user what the data should look like. To fill in this example row, you can pass in an example column value to the `example()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('sku')
    ->example('ABC123')
```

Or if you want to add more than one example row, you can pass an array to the `examples()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('sku')
    ->examples(['ABC123', 'DEF456'])
```

By default, the name of the column is used in the header of the example CSV. You can customize the header per-column using `exampleHeader()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('sku')
    ->exampleHeader('SKU')
```

## Using a custom user model

By default, the `imports` table has a `user_id` column. That column is constrained to the `users` table:

```php theme={"theme":"gruvbox-dark-hard"}
$table->foreignId('user_id')->constrained()->cascadeOnDelete();
```

In the `Import` model, the `user()` relationship is defined as a `BelongsTo` relationship to the `App\Models\User` model. If the `App\Models\User` model does not exist, or you want to use a different one, you can bind a new `Authenticatable` model to the container in a service provider's `register()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Admin;
use Illuminate\Contracts\Auth\Authenticatable;

$this->app->bind(Authenticatable::class, Admin::class);
```

If your authenticatable model uses a different table to `users`, you should pass that table name to `constrained()`:

```php theme={"theme":"gruvbox-dark-hard"}
$table->foreignId('user_id')->constrained('admins')->cascadeOnDelete();
```

### Using a polymorphic user relationship

If you want to associate imports with multiple user models, you can use a polymorphic `MorphTo` relationship instead. To do this, you need to replace the `user_id` column in the `imports` table:

```php theme={"theme":"gruvbox-dark-hard"}
$table->morphs('user');
```

Then, in a service provider's `boot()` method, you should call `Import::polymorphicUserRelationship()` to swap the `user()` relationship on the `Import` model to a `MorphTo` relationship:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\Models\Import;

Import::polymorphicUserRelationship();
```

## Limiting the maximum number of rows that can be imported

To prevent server overload, you may wish to limit the maximum number of rows that can be imported from one CSV file. You can do this by calling the `maxRows()` method on the action:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Imports\ProductImporter;
use Filament\Actions\ImportAction;

ImportAction::make()
    ->importer(ProductImporter::class)
    ->maxRows(100000)
```

<UtilityInjection set="actions" version="5.x">As well as allowing a static value, the `maxRows()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Changing the import chunk size

Filament will chunk the CSV, and process each chunk in a different queued job. By default, chunks are 100 rows at a time. You can change this by calling the `chunkSize()` method on the action:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Imports\ProductImporter;
use Filament\Actions\ImportAction;

ImportAction::make()
    ->importer(ProductImporter::class)
    ->chunkSize(250)
```

<UtilityInjection set="actions" version="5.x">As well as allowing a static value, the `chunkSize()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<Tip>
  If you are encountering memory or timeout issues when importing large CSV files, you may wish to reduce the chunk size.
</Tip>

## Changing the CSV delimiter

The default delimiter for CSVs is the comma (`,`). If your import uses a different delimiter, you may call the `csvDelimiter()` method on the action, passing a new one:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Imports\ProductImporter;
use Filament\Actions\ImportAction;

ImportAction::make()
    ->importer(ProductImporter::class)
    ->csvDelimiter(';')
```

<UtilityInjection set="actions" version="5.x">As well as allowing a static value, the `csvDelimiter()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

You can only specify a single character, otherwise an exception will be thrown.

## Changing the column header offset

If your column headers are not on the first row of the CSV, you can call the `headerOffset()` method on the action, passing the number of rows to skip:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Imports\ProductImporter;
use Filament\Actions\ImportAction;

ImportAction::make()
    ->importer(ProductImporter::class)
    ->headerOffset(5)
```

<UtilityInjection set="actions" version="5.x">As well as allowing a static value, the `headerOffset()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Customizing the completion notification

When an import finishes, Filament sends a notification to the user who started it. You can customize the title and body of that notification by overriding `getCompletedNotificationTitle()` and `getCompletedNotificationBody()` on your importer:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\Models\Import;

public static function getCompletedNotificationTitle(Import $import): string
{
    return 'Your product import has finished';
}

public static function getCompletedNotificationBody(Import $import): string
{
    return $import->successful_rows . ' products were imported.';
}
```

For anything beyond the title and body — for example, changing the notification color, adding extra actions, or replacing the icon — override `modifyCompletedNotification()`. You can either mutate the `Notification` passed in and return it, or build and return a completely new one:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Actions\Imports\Models\Import;
use Filament\Notifications\Notification;

public static function modifyCompletedNotification(Notification $notification, Import $import): Notification
{
    $notification->icon('heroicon-o-shopping-bag');

    if ($import->getOptions()['sendWelcomeEmails'] ?? false) {
        $notification->actions([
            ...$notification->getActions(),
            Action::make('viewWelcomeEmails')
                ->url(route('emails.sent')),
        ]);
    }

    return $notification;
}
```

The `Import` model exposes the column mapping and options the user selected via `$import->getColumnMap()` and `$import->getOptions()`, so you can tailor the notification based on what the user imported.

## Customizing the import job

The default job for processing imports is `Filament\Actions\Imports\Jobs\ImportCsv`. If you want to extend this class and override any of its methods, you may replace the original class in the `register()` method of a service provider:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Jobs\ImportCsv;
use Filament\Actions\Imports\Jobs\ImportCsv as BaseImportCsv;

$this->app->bind(BaseImportCsv::class, ImportCsv::class);
```

Or, you can pass the new job class to the `job()` method on the action, to customize the job for a specific import:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Imports\ProductImporter;
use App\Jobs\ImportCsv;
use Filament\Actions\ImportAction;

ImportAction::make()
    ->importer(ProductImporter::class)
    ->job(ImportCsv::class)
```

### Customizing the import queue and connection

By default, the import system will use the default queue and connection. If you'd like to customize the queue used for jobs of a certain importer, you may override the `getJobQueue()` method in your importer class:

```php theme={"theme":"gruvbox-dark-hard"}
public function getJobQueue(): ?string
{
    return 'imports';
}
```

You can also customize the connection used for jobs of a certain importer, by overriding the `getJobConnection()` method in your importer class:

```php theme={"theme":"gruvbox-dark-hard"}
public function getJobConnection(): ?string
{
    return 'sqs';
}
```

### Customizing the import job middleware

By default, the import system will only process one job at a time from each import. This is to prevent the server from being overloaded, and other jobs from being delayed by large imports. That functionality is defined in the `WithoutOverlapping` middleware on the importer class:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Queue\Middleware\WithoutOverlapping;

public function getJobMiddleware(): array
{
    return [
        (new WithoutOverlapping("import{$this->import->getKey()}"))->expireAfter(600),
    ];
}
```

If you'd like to customize the middleware that is applied to jobs of a certain importer, you may override this method in your importer class. You can read more about job middleware in the [Laravel docs](https://laravel.com/docs/queues#job-middleware).

### Customizing the import job retries

By default, the import system will retry a job for 24 hours, or until it fails 5 times with unhandled exceptions, whichever happens first. This is to allow for temporary issues, such as the database being unavailable, to be resolved. You may change the time period for the job to retry, which is defined in the `getJobRetryUntil()` method on the importer class:

```php theme={"theme":"gruvbox-dark-hard"}
use Carbon\CarbonInterface;

public function getJobRetryUntil(): ?CarbonInterface
{
    return now()->addHours(12);
}
```

You can read more about job retries in the [Laravel docs](https://laravel.com/docs/queues#max-job-attempts-and-timeout).

#### Customizing the import job backoff strategy

By default, the import system will wait 1 minute, then 2 minutes, then 5 minutes, then 10 minutes thereafter, before retrying a job. This is to prevent the server from being overloaded by a job that is failing repeatedly. That functionality is defined in the `getJobBackoff()` method on the importer class:

```php theme={"theme":"gruvbox-dark-hard"}
/**
* @return int | array<int> | null
 */
public function getJobBackoff(): int | array | null
{
    return [60, 120, 300, 600];
}
```

You can read more about job backoff, including how to configure exponential backoffs, in the [Laravel docs](https://laravel.com/docs/queues#dealing-with-failed-jobs).

### Customizing the import job tags

By default, the import system will tag each job with the ID of the import. This is to allow you to easily find all jobs related to a certain import. That functionality is defined in the `getJobTags()` method on the importer class:

```php theme={"theme":"gruvbox-dark-hard"}
public function getJobTags(): array
{
    return ["import{$this->import->getKey()}"];
}
```

If you'd like to customize the tags that are applied to jobs of a certain importer, you may override this method in your importer class.

### Customizing the import job batch name

By default, the import system doesn't define any name for the job batches. If you'd like to customize the name that is applied to job batches of a certain importer, you may override the `getJobBatchName()` method in your importer class:

```php theme={"theme":"gruvbox-dark-hard"}
public function getJobBatchName(): ?string
{
    return 'product-import';
}
```

## Customizing import validation messages

The import system will automatically validate the CSV file before it is imported. If there are any errors, the user will be shown a list of them, and the import will not be processed. If you'd like to override any default validation messages, you may do so by overriding the `getValidationMessages()` method on your importer class:

```php theme={"theme":"gruvbox-dark-hard"}
public function getValidationMessages(): array
{
    return [
        'name.required' => 'The name column must not be empty.',
    ];
}
```

To learn more about customizing validation messages, read the [Laravel docs](https://laravel.com/docs/validation#customizing-the-error-messages).

### Customizing import validation attributes

When columns fail validation, their label is used in the error message. To customize the label used in field error messages, use the `validationAttribute()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\ImportColumn;

ImportColumn::make('name')
    ->validationAttribute('full name')
```

## Customizing import file validation

You can add new [Laravel validation rules](https://laravel.com/docs/validation#available-validation-rules) for the import file using the `fileRules()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\ImportAction;
use Illuminate\Validation\Rules\File;

ImportAction::make()
    ->importer(ProductImporter::class)
    ->fileRules([
        'max:1024',
        // or
        File::types(['csv', 'txt'])->max(1024),
    ]),
```

<UtilityInjection set="actions" version="5.x">As well as allowing a static value, the `fileRules()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Lifecycle hooks

Hooks may be used to execute code at various points within an importer's lifecycle, like before a record is saved. To set up a hook, create a protected method on the importer class with the name of the hook:

```php theme={"theme":"gruvbox-dark-hard"}
protected function beforeSave(): void
{
    // ...
}
```

In this example, the code in the `beforeSave()` method will be called before the validated data from the CSV is saved to the database.

There are several available hooks for importers:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Imports\Importer;

class ProductImporter extends Importer
{
    // ...

    protected function beforeValidate(): void
    {
        // Runs before the CSV data for a row is validated.
    }

    protected function afterValidate(): void
    {
        // Runs after the CSV data for a row is validated.
    }

    protected function beforeFill(): void
    {
        // Runs before the validated CSV data for a row is filled into a model instance.
    }

    protected function afterFill(): void
    {
        // Runs after the validated CSV data for a row is filled into a model instance.
    }

    protected function beforeSave(): void
    {
        // Runs before a record is saved to the database.
    }

    protected function beforeCreate(): void
    {
        // Similar to `beforeSave()`, but only runs when creating a new record.
    }

    protected function beforeUpdate(): void
    {
        // Similar to `beforeSave()`, but only runs when updating an existing record.
    }

    protected function afterSave(): void
    {
        // Runs after a record is saved to the database.
    }
    
    protected function afterCreate(): void
    {
        // Similar to `afterSave()`, but only runs when creating a new record.
    }
    
    protected function afterUpdate(): void
    {
        // Similar to `afterSave()`, but only runs when updating an existing record.
    }
}
```

Inside these hooks, you can access the current row's data using `$this->data`. You can also access the original row of data from the CSV, before it was [cast](#casting-state) or mapped, using `$this->originalData`.

The current record (if it exists yet) is accessible in `$this->record`, and the [import form options](#using-import-options) using `$this->options`.

## Authorization

By default, only the user who started the import may access the failure CSV file that gets generated if part of an import fails. If you'd like to customize the authorization logic, you may create an `ImportPolicy` class, and [register it in your `AuthServiceProvider`](https://laravel.com/docs/authorization#registering-policies):

```php theme={"theme":"gruvbox-dark-hard"}
use App\Policies\ImportPolicy;
use Filament\Actions\Imports\Models\Import;

protected $policies = [
    Import::class => ImportPolicy::class,
];
```

The `view()` method of the policy will be used to authorize access to the failure CSV file.

Please note that if you define a policy, the existing logic of ensuring only the user who started the import can access the failure CSV file will be removed. You will need to add that logic to your policy if you want to keep it:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\User;
use Filament\Actions\Imports\Models\Import;

public function view(User $user, Import $import): bool
{
    return $import->user()->is($user);
}
```

## Security

### Per-record authorization

The import system does not perform per-record authorization checks when creating or updating records. Each row from the CSV is processed by the importer's `resolveRecord()`, `fillRecord()`, and `saveRecord()` methods without consulting your application's [Laravel policies](https://laravel.com/docs/authorization#creating-policies). This means that if a user is allowed to trigger an import, they can create or update any record that the importer supports, regardless of whether they would normally be authorized to do so through your application's UI.

If you need per-record authorization during import, you should add checks in your importer's [lifecycle hooks](#lifecycle-hooks), such as `beforeCreate()` or `beforeUpdate()`, to authorize the current user against the record.

<Danger>
  If your application allows untrusted users to trigger imports, you should implement per-record authorization checks to prevent unauthorized record creation or modification.
</Danger>

### CSV formula injection

When rows fail validation during import, Filament compiles them into a downloadable CSV for the user to review. This failure CSV contains the original data from the uploaded file exactly as it was submitted, without any transformation. If the uploaded CSV contains values beginning with characters like `=`, `+`, `-`, or `@`, they will appear unchanged in the failure CSV. When opened in spreadsheet software such as Microsoft Excel or Google Sheets, these values may be interpreted as formulas, which could pose a security risk if the original CSV was provided by an untrusted source. You should ensure that your users are aware of this risk when reviewing failure CSVs, or implement sanitization in your importer's lifecycle hooks to neutralize potentially dangerous values before they are stored as failed rows.

<EditOnGitHub version="5.x" path="packages/actions/docs/11-import.md" />

<Footer />
