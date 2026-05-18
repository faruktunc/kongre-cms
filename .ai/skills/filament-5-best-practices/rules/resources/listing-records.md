> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Listing records

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

<AutoScreenshot name="panels/resources/listing" alt="Resource listing page" version="5.x" />

## Using tabs to filter the records

You can add tabs above the table, which can be used to filter the records based on some predefined conditions. Each tab can scope the Eloquent query of the table in a different way. To register tabs, add a `getTabs()` method to the List page class, and return an array of `Tab` objects:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

public function getTabs(): array
{
    return [
        'all' => Tab::make(),
        'active' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('active', true)),
        'inactive' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('active', false)),
    ];
}
```

<AutoScreenshot name="panels/resources/listing-tabs" alt="Resource listing page with tabs" version="5.x" />

### Customizing the filter tab labels

The keys of the array will be used as identifiers for the tabs, so they can be persisted in the URL's query string. The label of each tab is also generated from the key, but you can override that by passing a label into the `make()` method of the tab:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

public function getTabs(): array
{
    return [
        'all' => Tab::make('All customers'),
        'active' => Tab::make('Active customers')
            ->modifyQueryUsing(fn (Builder $query) => $query->where('active', true)),
        'inactive' => Tab::make('Inactive customers')
            ->modifyQueryUsing(fn (Builder $query) => $query->where('active', false)),
    ];
}
```

### Adding icons to filter tabs

You can add icons to the tabs by passing an [icon](../styling/icons) into the `icon()` method of the tab:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Tabs\Tab;

Tab::make()
    ->icon('heroicon-m-user-group')
```

<AutoScreenshot name="panels/resources/listing-tabs-icons" alt="Resource listing page with tab icons" version="5.x" />

You can also change the icon's position to be after the label instead of before it, using the `iconPosition()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Enums\IconPosition;

Tab::make()
    ->icon('heroicon-m-user-group')
    ->iconPosition(IconPosition::After)
```

### Adding badges to filter tabs

You can add badges to the tabs by passing a string into the `badge()` method of the tab:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Tabs\Tab;

Tab::make()
    ->badge(Customer::query()->where('active', true)->count())
```

#### Changing the color of filter tab badges

The color of a badge may be changed using the `badgeColor()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Tabs\Tab;

Tab::make()
    ->badge(Customer::query()->where('active', true)->count())
    ->badgeColor('success')
```

<UtilityInjection set="schemaComponents" version="5.x" extras="Badge;;?string;;$badge;;The evaluated value of the badge.">As well as allowing a static value, the `badgeColor()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="panels/resources/listing-tabs-badge-colors" alt="Resource listing page with colored tab badges" version="5.x" />

#### Deferring the loading of filter tab badges

If you have expensive queries powering your tab badges (such as counting large datasets), the initial page load may be slow. You can defer the loading of tab badges using the `deferBadge()` method, which will load the badge values asynchronously after the page has rendered:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Tabs\Tab;

Tab::make()
    ->badge(static fn (): int => Customer::query()->where('active', true)->count())
    ->deferBadge()
```

<Danger>
  The `badge()` value must be returned from a function when using `deferBadge()`. If you pass a raw value like `badge(Customer::query()->count())`, the query runs immediately when the tab is built, defeating the purpose of deferral.
</Danger>

While the badges are loading, a small loading indicator will appear in place of each deferred badge. Once the data is fetched, the loading indicators will be replaced with the actual badge values.

### Adding extra attributes to filter tabs

You may also pass extra HTML attributes to filter tabs using `extraAttributes()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Tabs\Tab;

Tab::make()
    ->extraAttributes(['data-cy' => 'statement-confirmed-tab'])
```

### Customizing the default tab

To customize the default tab that is selected when the page is loaded, you can return the array key of the tab from the `getDefaultActiveTab()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Tabs\Tab;

public function getTabs(): array
{
    return [
        'all' => Tab::make(),
        'active' => Tab::make(),
        'inactive' => Tab::make(),
    ];
}

public function getDefaultActiveTab(): string | int | null
{
    return 'active';
}
```

### Excluding the tab query when resolving records

When a user interacts with a table record (e.g., clicking an action button), Filament resolves that record from the database. By default, the active tab's query is applied, ensuring users cannot access records outside the current tab's scope.

However, when a record's state changes after the user saw it in the table, you may still want the user to interact with it. For example, if you have an "Active" tab and an action sets a record to inactive, subsequent actions in the same modal would fail to resolve that record.

You may mark a tab to be excluded when resolving records using the `excludeQueryWhenResolvingRecord()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

public function getTabs(): array
{
    return [
        'active' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('active', true))
            ->excludeQueryWhenResolvingRecord(),
        'inactive' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('active', false))
            ->excludeQueryWhenResolvingRecord(),
    ];
}
```

<Danger>
  Do not use `excludeQueryWhenResolvingRecord()` on tabs that enforce authorization rules. For example, if you have a tab that restricts records by tenant or user ownership, those tabs should remain enforced to prevent unauthorized access.
</Danger>

## Authorization

For authorization, Filament will observe any [model policies](https://laravel.com/docs/authorization#creating-policies) that are registered in your app.

Users may access the List page if the `viewAny()` method of the model policy returns `true`.

The `reorder()` method is used to control [reordering a record](#reordering-records).

## Customizing the table Eloquent query

Although you can [customize the Eloquent query for the entire resource](./overview#customizing-the-resource-eloquent-query), you may also make specific modifications for the List page table. To do this, use the `modifyQueryUsing()` method in the `table()` method of the resource:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

public static function table(Table $table): Table
{
    return $table
        ->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScopes());
}
```

## Custom page content

Each page in Filament has its own [schema](../schemas), which defines the overall structure and content. You can override the schema for the page by defining a `content()` method on it. The `content()` method for the List page contains the following components by default:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\EmbeddedTable;
use Filament\Schemas\Components\RenderHook;
use Filament\Schemas\Schema;

public function content(Schema $schema): Schema
{
    return $schema
        ->components([
            $this->getTabsContentComponent(), // This method returns a component to display the tabs above a table
            RenderHook::make(PanelsRenderHook::RESOURCE_PAGES_LIST_RECORDS_TABLE_BEFORE),
            EmbeddedTable::make(), // This is the component that renders the table that is defined in this resource
            RenderHook::make(PanelsRenderHook::RESOURCE_PAGES_LIST_RECORDS_TABLE_AFTER),
        ]);
}
```

Inside the `components()` array, you can insert any [schema component](../schemas). You can reorder the components by changing the order of the array or remove any of the components that are not needed.

### Using a custom Blade view

For further customization opportunities, you can override the static `$view` property on the page class to a custom view in your app:

```php theme={"theme":"gruvbox-dark-hard"}
protected string $view = 'filament.resources.users.pages.list-users';
```

This assumes that you have created a view at `resources/views/filament/resources/users/pages/list-users.blade.php`:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament-panels::page>
    {{ $this->content }} {{-- This will render the content of the page defined in the `content()` method, which can be removed if you want to start from scratch --}}
</x-filament-panels::page>
```

<EditOnGitHub version="5.x" path="docs/03-resources/02-listing-records.md" />

<Footer />
