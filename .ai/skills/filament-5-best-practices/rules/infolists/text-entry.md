> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Text entry

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

Text entries display simple text:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('title')
```

<AutoScreenshot name="infolists/entries/text/simple" alt="Text entry" version="5.x" />

## Customizing the color

You may set a [color](../styling/colors) for the text:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('status')
    ->color('primary')
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `color()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/text/color" alt="Text entry in the primary color" version="5.x" />

## Adding an icon

Text entries may also have an [icon](../styling/icons):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Icons\Heroicon;

TextEntry::make('email')
    ->icon(Heroicon::Envelope)
```

<UtilityInjection set="infolistEntries" version="5.x">The `icon()` method also accepts a function to dynamically calculate the icon. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/text/icon" alt="Text entry with icon" version="5.x" />

You may set the position of an icon using `iconPosition()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Icons\Heroicon;

TextEntry::make('email')
    ->icon(Heroicon::Envelope)
    ->iconPosition(IconPosition::After) // `IconPosition::Before` or `IconPosition::After`
```

<UtilityInjection set="infolistEntries" version="5.x">The `iconPosition()` method also accepts a function to dynamically calculate the icon position. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/text/icon-after" alt="Text entry with icon after" version="5.x" />

The icon color defaults to the text color, but you may customize the icon [color](../styling/colors) separately using `iconColor()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Icons\Heroicon;

TextEntry::make('email')
    ->icon(Heroicon::Envelope)
    ->iconColor('primary')
```

<UtilityInjection set="infolistEntries" version="5.x">The `iconColor()` method also accepts a function to dynamically calculate the icon color. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/text/icon-color" alt="Text entry with icon in the primary color" version="5.x" />

## Displaying as a "badge"

By default, text is quite plain and has no background color. You can make it appear as a "badge" instead using the `badge()` method. A great use case for this is with statuses, where may want to display a badge with a [color](#customizing-the-color) that matches the status:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('status')
    ->badge()
    ->color(fn (string $state): string => match ($state) {
        'draft' => 'gray',
        'reviewing' => 'warning',
        'published' => 'success',
        'rejected' => 'danger',
    })
```

<AutoScreenshot name="infolists/entries/text/badge" alt="Text entry as badge" version="5.x" />

You may add other things to the badge, like an [icon](#adding-an-icon).

Optionally, you may pass a boolean value to control if the text should be in a badge or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('status')
    ->badge(FeatureFlag::active())
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `badge()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Formatting

When using a text entry, you may want the actual outputted text in the UI to differ from the raw [state](./overview#entry-content-state) of the entry, which is often automatically retrieved from an Eloquent model. Formatting the state allows you to preserve the integrity of the raw data while also allowing it to be presented in a more user-friendly way.

To format the state of a text entry without changing the state itself, you can use the `formatStateUsing()` method. This method accepts a function that takes the state as an argument and returns the formatted state:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('status')
    ->formatStateUsing(fn (string $state): string => __("statuses.{$state}"))
```

In this case, the `status` column in the database might contain values like `draft`, `reviewing`, `published`, or `rejected`, but the formatted state will be the translated version of these values.

<UtilityInjection set="infolistEntries" version="5.x">The function passed to `formatStateUsing()` can inject various utilities as parameters.</UtilityInjection>

### Date formatting

Instead of passing a function to `formatStateUsing()`, you may use the `date()`, `dateTime()`, and `time()` methods to format the entry's state using [PHP date formatting tokens](https://www.php.net/manual/en/datetime.format.php):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('created_at')
    ->date()

TextEntry::make('created_at')
    ->dateTime()

TextEntry::make('created_at')
    ->time()
```

<AutoScreenshot name="infolists/entries/text/date" alt="Text entry with date formatting" version="5.x" />

You may customize the date format by passing a custom format string to the `date()`, `dateTime()`, or `time()` method. You may use any [PHP date formatting tokens](https://www.php.net/manual/en/datetime.format.php):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('created_at')
    ->date('M j, Y')
    
TextEntry::make('created_at')
    ->dateTime('M j, Y H:i:s')
    
TextEntry::make('created_at')
    ->time('H:i:s')
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing static values, the `date()`, `dateTime()`, and `time()` methods also accept a function to dynamically calculate the format. You can inject various utilities into the function as parameters.</UtilityInjection>

#### Date formatting using Carbon macro formats

You may use also the `isoDate()`, `isoDateTime()`, and `isoTime()` methods to format the entry's state using [Carbon's macro-formats](https://carbon.nesbot.com/docs/#available-macro-formats):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('created_at')
    ->isoDate()

TextEntry::make('created_at')
    ->isoDateTime()

TextEntry::make('created_at')
    ->isoTime()
```

You may customize the date format by passing a custom macro format string to the `isoDate()`, `isoDateTime()`, or `isoTime()` method. You may use any [Carbon's macro-formats](https://carbon.nesbot.com/docs/#available-macro-formats):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('created_at')
    ->isoDate('L')

TextEntry::make('created_at')
    ->isoDateTime('LLL')

TextEntry::make('created_at')
    ->isoTime('LT')
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing static values, the `isoDate()`, `isoDateTime()`, and `isoTime()` methods also accept a function to dynamically calculate the format. You can inject various utilities into the function as parameters.</UtilityInjection>

#### Relative date formatting

You may use the `since()` method to format the entry's state using [Carbon's `diffForHumans()`](https://carbon.nesbot.com/docs/#api-humandiff):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('created_at')
    ->since()
```

<AutoScreenshot name="infolists/entries/text/since" alt="Text entry with relative date formatting" version="5.x" />

#### Displaying a formatting date in a tooltip

Additionally, you can use the `dateTooltip()`, `dateTimeTooltip()`, `timeTooltip()`, `isoDateTooltip()`, `isoDateTimeTooltip()`, `isoTime()`, `isoTimeTooltip()`, or `sinceTooltip()` method to display a formatted date in a [tooltip](./overview#adding-a-tooltip-to-an-entry), often to provide extra information:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('created_at')
    ->since()
    ->dateTooltip() // Accepts a custom PHP date formatting string

TextEntry::make('created_at')
    ->since()
    ->dateTimeTooltip() // Accepts a custom PHP date formatting string

TextEntry::make('created_at')
    ->since()
    ->timeTooltip() // Accepts a custom PHP date formatting string

TextEntry::make('created_at')
    ->since()
    ->isoDateTooltip() // Accepts a custom Carbon macro format string

TextEntry::make('created_at')
    ->since()
    ->isoDateTimeTooltip() // Accepts a custom Carbon macro format string

TextEntry::make('created_at')
    ->since()
    ->isoTimeTooltip() // Accepts a custom Carbon macro format string

TextEntry::make('created_at')
    ->dateTime()
    ->sinceTooltip()
```

<AutoScreenshot name="infolists/entries/text/date-tooltip" alt="Text entry with a date tooltip on relative dates" version="5.x" />

#### Setting the timezone for date formatting

Each of the date formatting methods listed above also accepts a `timezone` argument, which allows you to convert the time set in the state to a different timezone:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('created_at')
    ->dateTime(timezone: 'America/New_York')
```

You can also pass a timezone to the `timezone()` method of the entry to apply a timezone to all date-time formatting methods at once:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('created_at')
    ->timezone('America/New_York')
    ->dateTime()
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing static values, the `timezone()` method also accepts a function to dynamically calculate the timezone. You can inject various utilities into the function as parameters.</UtilityInjection>

If you do not pass a `timezone()` to the entry, it will use Filament's default timezone. You can set Filament's default timezone using the `FilamentTimezone::set()` method in the `boot()` method of a service provider such as `AppServiceProvider`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Facades\FilamentTimezone;

public function boot(): void
{
    FilamentTimezone::set('America/New_York');
}
```

This is useful if you want to set a default timezone for all text entries in your application. It is also used in other places where timezones are used in Filament.

<Warning>
  Filament's default timezone will only apply when the entry stores a time. If the entry stores a date only (`date()` instead of `dateTime()`), the timezone will not be applied. This is to prevent timezone shifts when storing dates without times.
</Warning>

### Number formatting

Instead of passing a function to `formatStateUsing()`, you can use the `numeric()` method to format an entry as a number:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('stock')
    ->numeric()
```

<AutoScreenshot name="infolists/entries/text/numeric" alt="Text entry with numeric formatting" version="5.x" />

If you would like to customize the number of decimal places used to format the number with, you can use the `decimalPlaces` argument:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('stock')
    ->numeric(decimalPlaces: 0)
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing static values, the `decimalPlaces` argument also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

By default, your app's locale will be used to format the number suitably. If you would like to customize the locale used, you can pass it to the `locale` argument:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('stock')
    ->numeric(locale: 'nl')
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing static values, the `locale` argument also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Money formatting

Instead of passing a function to `formatStateUsing()`, you can use the `money()` method to easily format amounts of money, in any currency:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('price')
    ->money('EUR')
```

<AutoScreenshot name="infolists/entries/text/money" alt="Text entry with money formatting" version="5.x" />

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing static values, the `money()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

There is also a `divideBy` argument for `money()` that allows you to divide the original value by a number before formatting it. This could be useful if your database stores the price in cents, for example:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('price')
    ->money('EUR', divideBy: 100)
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing static values, the `divideBy` argument also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

By default, your app's locale will be used to format the money suitably. If you would like to customize the locale used, you can pass it to the `locale` argument:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('price')
    ->money('EUR', locale: 'nl')
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing static values, the `locale` argument also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

If you would like to customize the number of decimal places used to format the number with, you can use the `decimalPlaces` argument:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('price')
    ->money('EUR', decimalPlaces: 3)
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing static values, the `decimalPlaces` argument also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Rendering Markdown

If your entry value is Markdown, you may render it using `markdown()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('description')
    ->markdown()
```

<AutoScreenshot name="infolists/entries/text/markdown" alt="Text entry with Markdown rendering" version="5.x" />

Optionally, you may pass a boolean value to control if the text should be rendered as Markdown or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('description')
    ->markdown(FeatureFlag::active())
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `markdown()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Rendering HTML

If your entry value is HTML, you may render it using `html()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('description')
    ->html()
```

<AutoScreenshot name="infolists/entries/text/html" alt="Text entry with HTML rendering" version="5.x" />

Optionally, you may pass a boolean value to control if the text should be rendered as HTML or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('description')
    ->html(FeatureFlag::active())
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `html()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<Danger>
  Filament's built-in HTML sanitizer permits inline `style` attributes in order to support rich text formatting features such as font colors, text highlighting, and image sizing. This means that CSS properties like `background: url(...)` or `position: fixed` will not be stripped from sanitized HTML. If your content comes from untrusted users, you should consider restricting the default configuration. See the [security documentation](../advanced/security#customizing-the-sanitizer) for details on how to customize the sanitizer.
</Danger>

#### Rendering raw HTML without sanitization

If you use this method, then the HTML will be sanitized to remove any potentially unsafe content before it is rendered. If you'd like to opt out of this behavior, you can wrap the HTML in an `HtmlString` object by formatting it:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Illuminate\Support\HtmlString;

TextEntry::make('description')
    ->formatStateUsing(fn (string $state): HtmlString => new HtmlString($state))
```

<Danger>
  Be cautious when rendering raw HTML, as it may contain malicious content, which can lead to security vulnerabilities in your app such as cross-site scripting (XSS) attacks. Always ensure that the HTML you are rendering is safe before using this method.
</Danger>

Alternatively, you can return a `view()` object from the `formatStateUsing()` method, which will also not be sanitized:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Illuminate\Contracts\View\View;

TextEntry::make('description')
    ->formatStateUsing(fn (string $state): View => view(
        'filament.infolists.components.description-entry-content',
        ['state' => $state],
    ))
```

## Listing multiple values

Multiple values can be rendered in a text entry if its [state](./overview#entry-content-state) is an array. This can happen if you are using an `array` cast on an Eloquent attribute, an Eloquent relationship with multiple results, or if you have passed an array to the [`state()` method](./overview#setting-the-state-of-an-entry). If there are multiple values inside your text entry, they will be comma-separated. You may use the `listWithLineBreaks()` method to display them on new lines instead:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('authors.name')
    ->listWithLineBreaks()
```

<AutoScreenshot name="infolists/entries/text/list" alt="Text entry with multiple values" version="5.x" />

Optionally, you may pass a boolean value to control if the text should have line breaks between each item or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('authors.name')
    ->listWithLineBreaks(FeatureFlag::active())
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `listWithLineBreaks()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Adding bullet points to the list

You may add a bullet point to each list item using the `bulleted()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('authors.name')
    ->bulleted()
```

<AutoScreenshot name="infolists/entries/text/bullet-list" alt="Text entry with multiple values and bullet points" version="5.x" />

Optionally, you may pass a boolean value to control if the text should have bullet points or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('authors.name')
    ->bulleted(FeatureFlag::active())
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `bulleted()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Limiting the number of values in the list

You can limit the number of values in the list using the `limitList()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('authors.name')
    ->listWithLineBreaks()
    ->limitList(3)
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `limitList()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

#### Expanding the limited list

You can allow the limited items to be expanded and collapsed, using the `expandableLimitedList()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('authors.name')
    ->listWithLineBreaks()
    ->limitList(3)
    ->expandableLimitedList()
```

<Info>
  This is only a feature for `listWithLineBreaks()` or `bulleted()`, where each item is on its own line.
</Info>

Optionally, you may pass a boolean value to control if the text should be expandable or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('authors.name')
    ->listWithLineBreaks()
    ->limitList(3)
    ->expandableLimitedList(FeatureFlag::active())
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `expandableLimitedList()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/text/expandable-limited-list" alt="Text entry with an expandable limited list" version="5.x" />

### Splitting a single value into multiple list items

If you want to "explode" a text string from your model into multiple list items, you can do so with the `separator()` method. This is useful for displaying comma-separated tags [as badges](#displaying-as-a-badge), for example:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('tags')
    ->badge()
    ->separator(',')
```

<AutoScreenshot name="infolists/entries/text/separator-badge" alt="Text entry with badges from comma-separated values" version="5.x" />

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `separator()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Aggregating relationships

Filament provides several methods for aggregating a relationship field, including `avg()`, `max()`, `min()` and `sum()`. For instance, if you wish to show the average of a field on all related records, you may use the `avg()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('users_avg_age')->avg('users', 'age')
```

In this example, `users` is the name of the relationship, while `age` is the field that is being averaged. The name of the entry must be `users_avg_age`, as this is the convention that [Laravel uses](https://laravel.com/docs/eloquent-relationships#other-aggregate-functions) for storing the result.

If you'd like to scope the relationship before aggregating, you can pass an array to the method, where the key is the relationship name and the value is the function to scope the Eloquent query with:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Illuminate\Database\Eloquent\Builder;

TextEntry::make('users_avg_age')->avg([
    'users' => fn (Builder $query) => $query->where('is_active', true),
], 'age')
```

## Customizing the text size

Text entries have small font size by default, but you may change this to `TextSize::ExtraSmall`, `TextSize::Medium`, or `TextSize::Large`.

For instance, you may make the text larger using `size(TextSize::Large)`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\TextSize;

TextEntry::make('title')
    ->size(TextSize::Large)
```

<AutoScreenshot name="infolists/entries/text/large" alt="Text entry in a large font size" version="5.x" />

## Customizing the font weight

Text entries have regular font weight by default, but you may change this to any of the following options: `FontWeight::Thin`, `FontWeight::ExtraLight`, `FontWeight::Light`, `FontWeight::Medium`, `FontWeight::SemiBold`, `FontWeight::Bold`, `FontWeight::ExtraBold` or `FontWeight::Black`.

For instance, you may make the font bold using `weight(FontWeight::Bold)`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\FontWeight;

TextEntry::make('title')
    ->weight(FontWeight::Bold)
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `weight()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/text/bold" alt="Text entry in a bold font" version="5.x" />

## Customizing the font family

You can change the text font family to any of the following options: `FontFamily::Sans`, `FontFamily::Serif` or `FontFamily::Mono`.

For instance, you may make the font monospaced using `fontFamily(FontFamily::Mono)`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Enums\FontFamily;
use Filament\Infolists\Components\TextEntry;

TextEntry::make('apiKey')
    ->label('API key')
    ->fontFamily(FontFamily::Mono)
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `fontFamily()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/text/mono" alt="Text entry in a monospaced font" version="5.x" />

## Handling long text

### Limiting text length

You may `limit()` the length of the entry's value:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('description')
    ->limit(50)
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `limit()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/text/limit" alt="Text entry with limited text length" version="5.x" />

By default, when text is truncated, an ellipsis (`...`) is appended to the end of the text. You may customize this by passing a custom string to the `end` argument:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('description')
    ->limit(50, end: ' (more)')
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `end` argument also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

You may also reuse the value that is being passed to `limit()` in a function, by getting it using the `getCharacterLimit()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('description')
    ->limit(50)
    ->tooltip(function (TextEntry $component): ?string {
        $state = $component->getState();

        if (strlen($state) <= $component->getCharacterLimit()) {
            return null;
        }

        // Only render the tooltip if the entry contents exceeds the length limit.
        return $state;
    })
```

### Limiting word count

You may limit the number of `words()` displayed in the entry:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('description')
    ->words(10)
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `words()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/text/words" alt="Text entry with limited word count" version="5.x" />

By default, when text is truncated, an ellipsis (`...`) is appended to the end of the text. You may customize this by passing a custom string to the `end` argument:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('description')
    ->words(10, end: ' (more)')
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `end` argument also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Limiting text to a specific number of lines

You may want to limit text to a specific number of lines instead of limiting it to a fixed length. Clamping text to a number of lines is useful in responsive interfaces where you want to ensure a consistent experience across all screen sizes. This can be achieved using the `lineClamp()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('description')
    ->lineClamp(2)
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `lineClamp()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/text/line-clamp" alt="Text entry with line clamping" version="5.x" />

### Preventing text wrapping

By default, text will wrap to the next line if it exceeds the width of the container. You can prevent this behavior using the `wrap(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('description')
    ->wrap(false)
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing a static value, the `wrap()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="infolists/entries/text/wrap" alt="Text entry with wrapping disabled" version="5.x" />

## Allowing the text to be copied to the clipboard

You may make the text copyable, such that clicking on the entry copies the text to the clipboard, and optionally specify a custom confirmation message and duration in milliseconds:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('apiKey')
    ->label('API key')
    ->copyable()
    ->copyMessage('Copied!')
    ->copyMessageDuration(1500)
```

<AutoScreenshot name="infolists/entries/text/copyable" alt="Text entry with a button to copy it" version="5.x" />

Optionally, you may pass a boolean value to control if the text should be copyable or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;

TextEntry::make('apiKey')
    ->label('API key')
    ->copyable(FeatureFlag::active())
```

<UtilityInjection set="infolistEntries" version="5.x">As well as allowing static values, the `copyable()`, `copyMessage()`, and `copyMessageDuration()` methods also accept functions to dynamically calculate them. You can inject various utilities into the function as parameters.</UtilityInjection>

<Warning>
  This feature only works when SSL is enabled for the app.
</Warning>

## Adding suffix and prefix actions

You may place an [action](../actions) before and after the entry using the `prefixAction()` and `suffixAction()` methods:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Icons\Heroicon;

TextEntry::make('cost')
    ->prefix('€')
    ->suffixAction(
        Action::make('copyCostToPrice')
            ->icon(Heroicon::Clipboard),
    )
```

<AutoScreenshot name="infolists/entries/actions/suffix" alt="Text entry with suffix action" version="5.x" />

<EditOnGitHub version="5.x" path="packages/infolists/docs/02-text-entry.md" />

<Footer />
