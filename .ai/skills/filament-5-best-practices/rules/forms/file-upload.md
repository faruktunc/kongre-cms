> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# File upload

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

The file upload field is based on [Filepond](https://pqina.nl/filepond).

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachment')
```

<AutoScreenshot name="forms/fields/file-upload/simple" alt="File upload" version="5.x" />

<Tip>
  Filament also supports [`spatie/laravel-medialibrary`](https://github.com/spatie/laravel-medialibrary). See our [plugin documentation](https://filamentphp.com/plugins/filament-spatie-media-library) for more information.
</Tip>

## Configuring the storage disk and directory

By default, files will be uploaded to the storage disk defined in the [configuration file](../introduction/installation#publishing-configuration). You can also set the `FILESYSTEM_DISK` environment variable to change this.

<Tip>
  To correctly preview images and other files, FilePond requires files to be served from the same domain as the app, or the appropriate CORS headers need to be present. Ensure that the `APP_URL` environment variable is correct, or modify the [filesystem](https://laravel.com/docs/filesystem) driver to set the correct URL. If you're hosting files on a separate domain like S3, ensure that CORS headers are set up.
</Tip>

To change the disk and directory for a specific field, and the visibility of files, use the `disk()`, `directory()` and `visibility()` methods. By default, files are uploaded with `private` visibility to your storage disk, unless the disk is set to `public`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachment')
    ->disk('s3')
    ->directory('form-attachments')
    ->visibility('public')
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `disk()`, `directory()` and `visibility()` methods accept functions to dynamically calculate them. You can inject various utilities into the functions as parameters. </UtilityInjection>

<Info>
  It is the responsibility of the developer to delete these files from the disk if they are removed, as Filament is unaware if they are depended on elsewhere. One way to do this automatically is observing a [model event](https://laravel.com/docs/eloquent#events).
</Info>

## Uploading multiple files

You may also upload multiple files. This stores URLs in JSON:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachments')
    ->multiple()
```

Optionally, you may pass a boolean value to control if multiple files can be uploaded at once:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachments')
    ->multiple(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `multiple()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

If you're saving the file URLs using Eloquent, you should be sure to add an `array` [cast](https://laravel.com/docs/eloquent-mutators#array-and-json-casting) to the model property:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    { 
        return [
            'attachments' => 'array',
        ];
    }

    // ...
}
```

### Controlling the maximum parallel uploads

You can control the maximum number of parallel uploads using the `maxParallelUploads()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachments')
    ->multiple()
    ->maxParallelUploads(1)
```

This will limit the number of parallel uploads to `1`. If unset, we'll use the [default FilePond value](https://pqina.nl/filepond/docs/api/instance/properties/#core-properties) which is `2`.

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `maxParallelUploads()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Controlling file names

By default, a random file name will be generated for newly-uploaded files. This is to ensure that there are never any conflicts with existing files.

### Security implications of controlling file names

Before using the `preserveFilenames()` or `getUploadedFileNameForStorageUsing()` methods, please be aware of the security implications. If you allow users to upload files with their own file names, there are ways that they can exploit this to upload malicious files. **This applies even if you use the [`acceptedFileTypes()`](#file-type-validation) method** to restrict the types of files that can be uploaded, since it uses Laravel's `mimetypes` rule which does not validate the extension of the file, only its mime type, which could be manipulated.

This is specifically an issue with the `getClientOriginalName()` method on the `TemporaryUploadedFile` object, which the `preserveFilenames()` method uses. By default, Livewire generates a random file name for each file uploaded, and uses the mime type of the file to determine the file extension.

Using these methods **with the `local` or `public` filesystem disks** will make your app vulnerable to remote code execution if the attacker uploads a PHP file with a deceptive mime type. **Using an S3 disk protects you from this specific attack vector**, as S3 will not execute PHP files in the same way that your server might when serving files from local storage.

If you are using the `local` or `public` disk, you should consider using the [`storeFileNamesIn()` method](#storing-original-file-names-independently) to store the original file names in a separate column in your database, and keep the randomly generated file names in the file system. This way, you can still display the original file names to users, while keeping the file system secure.

On top of this security issue, you should also be aware that allowing users to upload files with their own file names can lead to conflicts with existing files, and can make it difficult to manage your storage. Users could upload files with the same name and overwrite the other's content if you do not scope them to a specific directory, so these features should in all cases only be accessible to trusted users.

### Preserving original file names

<Danger>
  Before using this feature, please ensure that you have read the [security implications](#security-implications-of-controlling-file-names).
</Danger>

To preserve the original filenames of the uploaded files, use the `preserveFilenames()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachment')
    ->preserveFilenames()
```

Optionally, you may pass a boolean value to control if the original file names should be preserved:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachment')
    ->preserveFilenames(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `preserveFilenames()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Generating custom file names

<Danger>
  Before using this feature, please ensure that you have read the [security implications](#security-implications-of-controlling-file-names).
</Danger>

You may completely customize how file names are generated using the `getUploadedFileNameForStorageUsing()` method, and returning a string from the closure based on the `$file` that was uploaded:

```php theme={"theme":"gruvbox-dark-hard"}
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

FileUpload::make('attachment')
    ->getUploadedFileNameForStorageUsing(
        fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
            ->prepend('custom-prefix-'),
    )
```

<UtilityInjection set="formFields" version="5.x" extras="File;;Livewire\Features\SupportFileUploads\TemporaryUploadedFile;;$file;;The temporary file object being uploaded.">You can inject various utilities into the function passed to `getUploadedFileNameForStorageUsing()` as parameters.</UtilityInjection>

### Storing original file names independently

You can keep the randomly generated file names, while still storing the original file name, using the `storeFileNamesIn()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachments')
    ->multiple()
    ->storeFileNamesIn('attachment_file_names')
```

`attachment_file_names` will now store the original file names of your uploaded files, so you can save them to the database when the form is submitted. If you're uploading `multiple()` files, make sure that you add an `array` [cast](https://laravel.com/docs/eloquent-mutators#array-and-json-casting) to this Eloquent model property too.

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `storeFileNamesIn()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Authorizing existing file paths

The value of a `FileUpload` field is a string, or an array of strings, containing the path to the file on the configured disk. Like any other Livewire form field value, it is controlled by the client: a request can be intercepted to change the submitted path to any other file on the same disk. If the field points at a resource that must not be accessible to other users — a private document on a shared disk, or a per-user directory — an attacker could otherwise cause the record to reference (and serve a signed URL for) someone else's file.

Filament allows this by default because legitimate features depend on it — for example, an action that sets the field to a pre-uploaded template file, or a "copy from another record" button. If none of your fields rely on such a flow, call `preventFilePathTampering()` on the field to enable a built-in check:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('avatar')
    ->preventFilePathTampering()
```

Filament compares every submitted string path against the value originally loaded from the record (via `$record->getOriginal()` for the attribute matching the field name). Paths that do not match cause the field to fail validation, so the record is never saved with a tampered value. Newly uploaded files always pass through, the field can still be cleared, and for `multiple()` fields each entry is checked individually.

<Warning>
  `preventFilePathTampering()` needs a record on the form. Without one — for example, on a create page — every submitted string path fails validation unless the [`allowFilePathUsing`](#allowing-additional-file-paths-with-a-callback) callback approves it. New uploads are unaffected.
</Warning>

To apply this check to every `FileUpload` in your application without repeating it on each field, call `configureUsing()` in a service provider's `boot()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::configureUsing(function (FileUpload $component): void {
    $component->preventFilePathTampering();
});
```

Individual fields can still opt out by calling `preventFilePathTampering(false)`.

### Allowing additional file paths with a callback

If your application legitimately references a path that is not on the record — for example, a button that selects a pre-uploaded template file — pass the `allowFilePathUsing` argument to approve it. Approved paths bypass the validation error:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('avatar')
    ->preventFilePathTampering(
        allowFilePathUsing: fn (string $file): bool => str_starts_with($file, 'templates/'),
    )
```

<UtilityInjection set="formFields" version="5.x" extras="File;;string;;$file;;The submitted file path being authorized.">You can inject various utilities into the function passed to `allowFilePathUsing` as parameters.</UtilityInjection>

The validation error message can be customized via [`validationMessages()`](./validation#customizing-validation-messages) using the `tampered` key:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('avatar')
    ->preventFilePathTampering()
    ->validationMessages([
        'tampered' => 'The selected attachment is not permitted.',
    ])
```

## Avatar mode

You can enable avatar mode for your file upload field using the `avatar()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('avatar')
    ->avatar()
```

This will only allow images to be uploaded, and when they are, it will display them in a compact circle layout that is perfect for avatars.

<AutoScreenshot name="forms/fields/file-upload/avatar" alt="File upload with avatar mode" version="5.x" />

This feature pairs well with the [circle cropper](#allowing-users-to-crop-images-as-a-circle).

## Image editor

You can enable an image editor for your file upload field using the `imageEditor()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('image')
    ->image()
    ->imageEditor()
```

You can open the editor once you upload an image by clicking the pencil icon. You can also open the editor by clicking the pencil icon on an existing image, which will remove and re-upload it on save.

<AutoScreenshot name="forms/fields/file-upload/image-editor" alt="File upload image editor with cropping controls" version="5.x" />

Optionally, you may pass a boolean value to control if the image editor is enabled:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('image')
    ->image()
    ->imageEditor(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `imageEditor()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Allowing users to crop images to aspect ratios

You can allow users to crop images to a set of specific aspect ratios using the `imageEditorAspectRatioOptions()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('image')
    ->image()
    ->imageEditor()
    ->imageEditorAspectRatioOptions([
        '16:9',
        '4:3',
        '1:1',
    ])
```

You can also allow users to choose no aspect ratio, "free cropping", by passing `null` as an option:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('image')
    ->image()
    ->imageEditor()
    ->imageEditorAspectRatioOptions([
        null,
        '16:9',
        '4:3',
        '1:1',
    ])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `imageEditorAspectRatioOptions()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Setting the image editor's mode

You can change the mode of the image editor using the `imageEditorMode()` method, which accepts either `1`, `2` or `3`. These options are explained in the [Cropper.js documentation](https://github.com/fengyuanchen/cropperjs/blob/v1/README.md#viewmode):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('image')
    ->image()
    ->imageEditor()
    ->imageEditorMode(2)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `imageEditorMode()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Customizing the image editor's empty fill color

By default, the image editor will make the empty space around the image transparent. You can customize this using the `imageEditorEmptyFillColor()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('image')
    ->image()
    ->imageEditor()
    ->imageEditorEmptyFillColor('#000000')
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `imageEditorEmptyFillColor()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Setting the image editor's viewport size

You can change the size of the image editor's viewport using the `imageEditorViewportWidth()` and `imageEditorViewportHeight()` methods, which generate an aspect ratio to use across device sizes:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('image')
    ->image()
    ->imageEditor()
    ->imageEditorViewportWidth('1920')
    ->imageEditorViewportHeight('1080')
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `imageEditorViewportWidth()` and `imageEditorViewportHeight()` methods also accept functions to dynamically calculate them. You can inject various utilities into the functions as parameters.</UtilityInjection>

### Allowing users to crop images as a circle

You can allow users to crop images as a circle using the `circleCropper()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('image')
    ->image()
    ->avatar()
    ->imageEditor()
    ->circleCropper()
```

This is perfectly accompanied by the [`avatar()` method](#avatar-mode), which renders the images in a compact circle layout.

Optionally, you may pass a boolean value to control if the circle cropper is enabled:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('image')
    ->image()
    ->avatar()
    ->imageEditor()
    ->circleCropper(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `circleCropper()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Enforcing a specific aspect ratio

If you need to ensure all uploaded images conform to a specific aspect ratio, you can combine the [`imageAspectRatio()` validation method](#image-aspect-ratio-validation) with `automaticallyOpenImageEditorForAspectRatio()`. This will automatically open a simplified image editor when a user uploads an image that doesn't match the required aspect ratio, allowing them to crop the image before it is saved:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('banner')
    ->image()
    ->imageAspectRatio('16:9')
    ->automaticallyOpenImageEditorForAspectRatio()
```

The editor that appears when cropping is required only shows the crop area and save/cancel buttons - it does not include the full editing controls (rotation, position inputs, etc.) that appear when using [`imageEditor()`](#image-editor). This provides a streamlined experience focused on getting the correct aspect ratio.

If you want users to have access to the full image editor controls, you can enable both:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('banner')
    ->image()
    ->imageEditor()
    ->imageAspectRatio('16:9')
    ->automaticallyOpenImageEditorForAspectRatio()
```

With both enabled, the image editor will still open automatically when the aspect ratio doesn't match, but users will also see an edit button on each uploaded image and have access to all editing controls.

Optionally, you may pass a boolean value to control if the aspect ratio editor is enabled:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('banner')
    ->image()
    ->imageAspectRatio('16:9')
    ->automaticallyOpenImageEditorForAspectRatio(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `automaticallyOpenImageEditorForAspectRatio()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<Info>
  The `automaticallyOpenImageEditorForAspectRatio()` method can only be used with a single aspect ratio. If you need to allow multiple aspect ratios, use `imageAspectRatio()` for validation only, and consider using [`imageEditor()`](#image-editor) with [`imageEditorAspectRatioOptions()`](#allowing-users-to-crop-images-to-aspect-ratios) to let users choose their preferred ratio.
</Info>

<Info>
  The `automaticallyOpenImageEditorForAspectRatio()` method is not available when [`multiple()`](#uploading-multiple-files) is enabled.
</Info>

### Cropping and resizing images without the editor

Filepond allows you to crop and resize images before they are uploaded, without the need for a separate editor. You can customize this behavior using the `automaticallyResizeImagesToHeight()` and `automaticallyResizeImagesToWidth()` methods. `automaticallyResizeImagesMode()` should be set for these methods to have an effect - either [`force`, `cover`, or `contain`](https://pqina.nl/filepond/docs/api/plugins/image-resize).

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('image')
    ->image()
    ->automaticallyCropImagesToAspectRatio('16:9')
    ->automaticallyResizeImagesMode('cover')
    ->automaticallyResizeImagesToWidth('1920')
    ->automaticallyResizeImagesToHeight('1080')
```

To enable automatic cropping with a specific aspect ratio, use the `automaticallyCropImagesToAspectRatio()` method. If you also have `imageAspectRatio()` set for validation and want the automatic crop to use the same ratio, you can call `automaticallyCropImagesToAspectRatio()` without any arguments:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('image')
    ->image()
    ->imageAspectRatio('16:9')
    ->automaticallyCropImagesToAspectRatio()
    ->automaticallyResizeImagesMode('cover')
    ->automaticallyResizeImagesToWidth('1920')
    ->automaticallyResizeImagesToHeight('1080')
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `automaticallyResizeImagesMode()`, `automaticallyCropImagesToAspectRatio()`, `automaticallyResizeImagesToHeight()` and `automaticallyResizeImagesToWidth()` methods also accept functions to dynamically calculate them. You can inject various utilities into the functions as parameters.</UtilityInjection>

<Warning>
  When using automatic image cropping, the crop is applied automatically without user interaction. The user cannot choose which part of the image to keep. If you want users to control how their images are cropped, use [`automaticallyOpenImageEditorForAspectRatio()`](#enforcing-a-specific-aspect-ratio) instead.
</Warning>

## Altering the appearance of the file upload area

You may also alter the general appearance of the Filepond component. Available options for these methods are available on the [Filepond website](https://pqina.nl/filepond/docs/api/instance/properties/#styles).

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachment')
    ->imagePreviewHeight('250')
    ->loadingIndicatorPosition('left')
    ->panelAspectRatio('2:1')
    ->panelLayout('integrated')
    ->removeUploadedFileButtonPosition('right')
    ->uploadButtonPosition('left')
    ->uploadProgressIndicatorPosition('left')
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, these methods also accept functions to dynamically calculate them. You can inject various utilities into the functions as parameters.</UtilityInjection>

### Displaying files in a grid

You can use the [Filepond `grid` layout](https://pqina.nl/filepond/docs/api/style/#grid-layout) by setting the `panelLayout()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachments')
    ->multiple()
    ->panelLayout('grid')
```

<AutoScreenshot name="forms/fields/file-upload/multiple-grid" alt="File upload with grid layout" version="5.x" />

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `panelLayout()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Reordering files

You can also allow users to re-order uploaded files using the `reorderable()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachments')
    ->multiple()
    ->reorderable()
```

When using this method, FilePond may add newly-uploaded files to the beginning of the list, instead of the end. To fix this, use the `appendFiles()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachments')
    ->multiple()
    ->reorderable()
    ->appendFiles()
```

Optionally, the `reorderable()` and `appendFiles()` methods accept a boolean value to control if the files can be reordered and if new files should be appended to the end of the list:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachments')
    ->multiple()
    ->reorderable(FeatureFlag::active())
    ->appendFiles(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `reorderable()` and `appendFiles()` methods also accept functions to dynamically calculate them. You can inject various utilities into the functions as parameters.</UtilityInjection>

## Opening files in a new tab

You can add a button to open each file in a new tab with the `openable()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachments')
    ->multiple()
    ->openable()
```

Optionally, you may pass a boolean value to control if the files can be opened in a new tab:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachments')
    ->multiple()
    ->openable(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `openable()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/file-upload/openable" alt="File upload with openable files" version="5.x" />

### Customizing the URL used when opening a file

By default, the "open" button links to the same URL that is used to display the file in FilePond. If you need a different URL — for example, a signed URL, a URL on a different domain, or a URL for a derived file such as a PDF thumbnail generated by [Spatie Media Library's image generators](https://spatie.be/docs/laravel-medialibrary/v11/converting-other-file-types/using-image-generators#pdf) — you can use the `getOpenableFileUrlUsing()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachments')
    ->multiple()
    ->openable()
    ->getOpenableFileUrlUsing(fn (string $file): string => Storage::disk('s3')->temporaryUrl($file, now()->addMinutes(5)))
```

The function receives the stored `$file` path and must return the URL that should be used when the "open" button is clicked. Returning `null` falls back to the default URL.

<UtilityInjection set="formFields" version="5.x">The `getOpenableFileUrlUsing()` method also accepts a function with utility injection. In addition to the standard utilities, the `$file` parameter contains the stored file path.</UtilityInjection>

## Downloading files

If you wish to add a download button to each file instead, you can use the `downloadable()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachments')
    ->multiple()
    ->downloadable()
```

Optionally, you may pass a boolean value to control if the files can be downloaded:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachments')
    ->multiple()
    ->downloadable(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `downloadable()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/file-upload/downloadable" alt="File upload with downloadable files" version="5.x" />

### Customizing the URL used when downloading a file

By default, the download button links to the same URL that is used to display the file in FilePond. If you need a different URL — for example, a signed URL with a `Content-Disposition: attachment` header, or a URL to the original file when the preview renders a derived image — you can use the `getDownloadableFileUrlUsing()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachments')
    ->multiple()
    ->downloadable()
    ->getDownloadableFileUrlUsing(fn (string $file): string => route('attachments.download', ['path' => $file]))
```

The function receives the stored `$file` path and must return the URL that should be used when the download button is clicked. Returning `null` falls back to the default URL.

<UtilityInjection set="formFields" version="5.x">The `getDownloadableFileUrlUsing()` method also accepts a function with utility injection. In addition to the standard utilities, the `$file` parameter contains the stored file path.</UtilityInjection>

## Previewing files

By default, some file types can be previewed in FilePond. If you wish to disable the preview for all files, you can use the `previewable(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachments')
    ->multiple()
    ->previewable(false)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `previewable()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Moving files instead of copying when the form is submitted

By default, files are initially uploaded to Livewire's temporary storage directory, and then copied to the destination directory when the form is submitted. If you wish to move the files instead, providing that temporary uploads are stored on the same disk as permanent files, you can use the `moveFiles()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachment')
    ->moveFiles()
```

Optionally, you may pass a boolean value to control if the files should be moved:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachment')
    ->moveFiles(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `moveFiles()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Preventing files from being stored permanently

If you wish to prevent files from being stored permanently when the form is submitted, you can use the `storeFiles(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachment')
    ->storeFiles(false)
```

When the form is submitted, a temporary file upload object will be returned instead of a permanently stored file path. This is perfect for temporary files like imported CSVs.

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `storeFiles()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<Warning>
  Images, video and audio files will not show the stored file name in the form's preview, unless you use [`previewable(false)`](#previewing-files). This is due to a limitation with the FilePond preview plugin.
</Warning>

## Orienting images from their EXIF data

By default, FilePond will automatically orient images based on their EXIF data. If you wish to disable this behavior, you can use the `orientImagesFromExif(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachment')
    ->orientImagesFromExif(false)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `orientImagesFromExif()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Hiding the remove file button

It is also possible to hide the remove uploaded file button by using `deletable(false)`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachment')
    ->deletable(false)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `deletable()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Preventing pasting files

You can disable the ability to paste files via the clipboard using the `pasteable(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachment')
    ->pasteable(false)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `pasteable()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Preventing file information fetching

While the form is loaded, it will automatically detect whether the files exist, what size they are, and what type of files they are. This is all done on the backend. When using remote storage with many files, this can be time-consuming. You can use the `fetchFileInformation(false)` method to disable this feature:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachment')
    ->fetchFileInformation(false)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `fetchFileInformation()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Customizing the uploading message

You may customize the uploading message that is displayed in the form's submit button using the `uploadingMessage()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachment')
    ->uploadingMessage('Uploading attachment...')
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `uploadingMessage()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## File upload validation

As well as all rules listed on the [validation](./validation) page, there are additional rules that are specific to file uploads.

Since Filament is powered by Livewire and uses its file upload system, you will want to refer to the default Livewire file upload validation rules in the `config/livewire.php` file as well. This also controls the 12MB file size maximum.

<Info>
  Many of these validation rules only apply to newly uploaded files. Existing files that were uploaded before the validation rules were added will not be re-validated.
</Info>

### File type validation

<Danger>
  By default, a `FileUpload` accepts **any file type**, the same way Laravel's `file` validation rule does. On a `local` or `public` disk served by a PHP-executing web server, this means a user can upload a `.php` file and have it executed as code — remote code execution. You should **always** call `acceptedFileTypes()` (or `image()`) with an explicit list of MIME types unless you have a specific reason not to. Doing so also activates Laravel's built-in block on PHP-family extensions (`.php`, `.phtml`, `.phar`, etc.) via the `mimetypes` validation rule, rejecting files whose client-supplied filename would otherwise land on disk as executable code.
</Danger>

You may restrict the types of files that may be uploaded using the `acceptedFileTypes()` method, and passing an array of MIME types.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('document')
    ->acceptedFileTypes(['application/pdf'])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `acceptedFileTypes()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

You may also use the `image()` method as shorthand to allow all image MIME types.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('image')
    ->image()
```

<AutoScreenshot name="forms/fields/file-upload/image-preview" alt="File upload with image preview" version="5.x" />

#### Custom MIME type mapping

Some file formats may not be recognized correctly by the browser when uploading files. Filament allows you to manually define MIME types for specific file extensions using the `mimeTypeMap()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('designs')
    ->acceptedFileTypes([
        'x-world/x-3dmf',
        'application/vnd.sketchup.skp',
    ])
    ->mimeTypeMap([
        '3dm' => 'x-world/x-3dmf',
        'skp' => 'application/vnd.sketchup.skp',
    ]);
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `mimeTypeMap()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### File size validation

You may also restrict the size of uploaded files in kilobytes:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachment')
    ->minSize(512)
    ->maxSize(1024)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `minSize()` and `maxSize()` methods also accept functions to dynamically calculate them. You can inject various utilities into the functions as parameters.</UtilityInjection>

#### Uploading large files

If you experience issues when uploading large files, such as HTTP requests failing with a response status of 422 in the browser's console, you may need to tweak your configuration.

In the `php.ini` file for your server, increasing the maximum file size may fix the issue:

```ini theme={"theme":"gruvbox-dark-hard"}
post_max_size = 120M
upload_max_filesize = 120M
```

Livewire also validates file size before uploading. To publish the Livewire config file, run:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan livewire:publish --config
```

The [max upload size can be adjusted in the `rules` key of `temporary_file_upload`](https://livewire.laravel.com/docs/uploads#global-validation). In this instance, KB are used in the rule, and 120MB is 122880KB:

```php theme={"theme":"gruvbox-dark-hard"}
'temporary_file_upload' => [
    // ...
    'rules' => ['required', 'file', 'max:122880'],
    // ...
],
```

### Image dimension validation

You may restrict the dimensions of uploaded images using the `rule()` method with Laravel's `Rule::dimensions()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;
use Illuminate\Validation\Rule;

FileUpload::make('photo')
    ->image()
    ->rule(Rule::dimensions()->minWidth(800)->minHeight(600))
```

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;
use Illuminate\Validation\Rule;

FileUpload::make('photo')
    ->image()
    ->rule(Rule::dimensions()->maxWidth(1920)->maxHeight(1080))
```

You can combine minimum and maximum constraints:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;
use Illuminate\Validation\Rule;

FileUpload::make('photo')
    ->image()
    ->rule(
        Rule::dimensions()
            ->minWidth(800)
            ->minHeight(600)
            ->maxWidth(1920)
            ->maxHeight(1080)
    )
```

<Info>
  These dimension validation rules only apply to newly uploaded files. Existing files that were uploaded before the validation rules were added will not be re-validated.
</Info>

### Image aspect ratio validation

You may restrict the aspect ratio of uploaded images using the `imageAspectRatio()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('banner')
    ->image()
    ->imageAspectRatio('16:9')
```

You can allow multiple aspect ratios by passing an array:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('banner')
    ->image()
    ->imageAspectRatio(['16:9', '4:3', '1:1'])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `imageAspectRatio()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

You can also specify a range of acceptable aspect ratios using `Rule::dimensions()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;
use Illuminate\Validation\Rule;

FileUpload::make('banner')
    ->image()
    ->rule(Rule::dimensions()->minRatio(4 / 3)->maxRatio(16 / 9))
```

<Info>
  These aspect ratio validation rules only apply to newly uploaded files. Existing files that were uploaded before the validation rules were added will not be re-validated.
</Info>

<Tip>
  If you want to help users meet the aspect ratio requirement rather than just rejecting invalid uploads, consider using [`automaticallyOpenImageEditorForAspectRatio()`](#enforcing-a-specific-aspect-ratio) alongside `imageAspectRatio()`. This will automatically open a crop editor when an uploaded image doesn't match the required ratio. Alternatively, you can use [`automaticallyCropImagesToAspectRatio()`](#cropping-and-resizing-images-without-the-editor) to automatically crop images to the required ratio without user interaction.
</Tip>

### Number of files validation

You may customize the number of files that may be uploaded, using the `minFiles()` and `maxFiles()` methods:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;

FileUpload::make('attachments')
    ->multiple()
    ->minFiles(2)
    ->maxFiles(5)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `minFiles()` and `maxFiles()` methods also accept functions to dynamically calculate them. You can inject various utilities into the functions as parameters.</UtilityInjection>

<EditOnGitHub version="5.x" path="packages/forms/docs/09-file-upload.md" />

<Footer />
