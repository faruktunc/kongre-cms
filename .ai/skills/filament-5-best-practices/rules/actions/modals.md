> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Modals

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

Actions may require additional confirmation or input from the user before they run. You may open a modal before an action is executed to do this.

## Confirmation modals

You may require confirmation before an action is run using the `requiresConfirmation()` method. This is useful for particularly destructive actions, such as those that delete records.

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Filament\Actions\Action;

Action::make('delete')
    ->action(fn (Post $record) => $record->delete())
    ->requiresConfirmation()
```

<AutoScreenshot name="actions/modal/confirmation" alt="Confirmation modal" version="5.x" />

<Warning>
  The confirmation modal is not available when a `url()` is set instead of an `action()`. Instead, you should redirect to the URL within the `action()` closure.
</Warning>

## Controlling modal content

### Customizing the modal's heading, description, and submit action label

You may customize the heading, description and label of the submit button in the modal:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Filament\Actions\Action;

Action::make('delete')
    ->action(fn (Post $record) => $record->delete())
    ->requiresConfirmation()
    ->modalHeading('Delete post')
    ->modalDescription('Are you sure you\'d like to delete this post? This cannot be undone.')
    ->modalSubmitActionLabel('Yes, delete it')
```

<AutoScreenshot name="actions/modal/confirmation-custom-text" alt="Confirmation modal with custom text" version="5.x" />

### Rendering a schema in a modal

Filament allows you to render a [schema](../schemas) in a modal, which allows you to render any of the available components to build a UI. Usually, it is useful to build a form in the schema that can collect extra information from the user before the action runs, but any UI can be rendered:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

Action::make('viewUser')
    ->schema([
        Grid::make(2)
            ->schema([
                Section::make('Details')
                    ->schema([
                        TextInput::make('name'),
                        Select::make('position')
                            ->options([
                                'developer' => 'Developer',
                                'designer' => 'Designer',
                            ]),
                        Checkbox::make('is_admin'),
                    ]),
                Section::make('Auditing')
                    ->schema([
                        TextEntry::make('created_at')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->dateTime(),
                    ]),
            ]),
    ])
```

<UtilityInjection set="actions" version="5.x">As well as allowing a static value, the `schema()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="actions/modal/schema" alt="Modal with schema layout" version="5.x" />

#### Rendering a form in a modal

You may use [form field](../forms) to create action modal forms. The data from the form is available in the `$data` array of the `action()` closure:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;

Action::make('updateAuthor')
    ->schema([
        Select::make('authorId')
            ->label('Author')
            ->options(User::query()->pluck('name', 'id'))
            ->required(),
    ])
    ->action(function (array $data, Post $record): void {
        $record->author()->associate($data['authorId']);
        $record->save();
    })
```

<AutoScreenshot name="actions/modal/form" alt="Modal with form" version="5.x" />

##### Filling the form with existing data

You may fill the form with existing data, using the `fillForm()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;

Action::make('updateAuthor')
    ->fillForm(fn (Post $record): array => [
        'authorId' => $record->author->id,
    ])
    ->schema([
        Select::make('authorId')
            ->label('Author')
            ->options(User::query()->pluck('name', 'id'))
            ->required(),
    ])
    ->action(function (array $data, Post $record): void {
        $record->author()->associate($data['authorId']);
        $record->save();
    })
```

<UtilityInjection set="actions" version="5.x">The `fillForm()` method also accepts a function to dynamically calculate the data to fill the form with. You can inject various utilities into the function as parameters.</UtilityInjection>

##### Disabling all form fields

You may wish to disable all form fields in the modal, ensuring the user cannot edit them. You may do so using the `disabledForm()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

Action::make('approvePost')
    ->schema([
        TextInput::make('title'),
        Textarea::make('content'),
    ])
    ->disabledForm()
    ->action(function (Post $record): void {
        $record->approve();
    })
```

<AutoScreenshot name="actions/modal/disabled-form" alt="Modal with disabled form fields" version="5.x" />

#### Rendering a wizard in a modal

You may create a [multistep form wizard](../schemas/wizards) inside a modal. Instead of using a `schema()`, define a `steps()` array and pass your `Step` objects:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Wizard\Step;

Action::make('create')
    ->steps([
        Step::make('Name')
            ->description('Give the category a unique name')
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->live()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->disabled()
                    ->required()
                    ->unique(Category::class, 'slug'),
            ])
            ->columns(2),
        Step::make('Description')
            ->description('Add some extra details')
            ->schema([
                MarkdownEditor::make('description'),
            ]),
        Step::make('Visibility')
            ->description('Control who can view it')
            ->schema([
                Toggle::make('is_visible')
                    ->label('Visible to customers.')
                    ->default(true),
            ]),
    ])
```

<AutoScreenshot name="actions/modal/wizard" alt="Modal with wizard" version="5.x" />

### Adding an icon inside the modal

You may add an [icon](../styling/icons) inside the modal using the `modalIcon()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Filament\Actions\Action;

Action::make('delete')
    ->action(fn (Post $record) => $record->delete())
    ->requiresConfirmation()
    ->modalIcon('heroicon-o-trash')
```

<UtilityInjection set="actions" version="5.x">The `modalIcon()` method also accepts a function to dynamically calculate the value. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="actions/modal/icon" alt="Confirmation modal with icon" version="5.x" />

By default, the icon will inherit the color of the action button. You may customize the color of the icon using the `modalIconColor()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Filament\Actions\Action;

Action::make('delete')
    ->action(fn (Post $record) => $record->delete())
    ->requiresConfirmation()
    ->color('danger')
    ->modalIcon('heroicon-o-trash')
    ->modalIconColor('warning')
```

<UtilityInjection set="actions" version="5.x">The `modalIconColor()` method also accepts a function to dynamically calculate the value. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="actions/modal/icon-color" alt="Confirmation modal with custom icon color" version="5.x" />

### Customizing the alignment of modal content

By default, modal content will be aligned to the start, or centered if the modal is `xs` or `sm` in [width](#changing-the-modal-width). If you wish to change the alignment of content in a modal, you can use the `modalAlignment()` method and pass it `Alignment::Start` or `Alignment::Center`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Support\Enums\Alignment;

Action::make('updateAuthor')
    ->schema([
        // ...
    ])
    ->action(function (array $data): void {
        // ...
    })
    ->modalAlignment(Alignment::Center)
```

<UtilityInjection set="actions" version="5.x">The `modalAlignment()` method also accepts a function to dynamically calculate the value. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="actions/modal/alignment" alt="Modal with centered content alignment" version="5.x" />

### Making the modal header sticky

The header of a modal scrolls out of view with the modal content when it overflows the modal size. However, slide-overs have a sticky header that's always visible. You may control this behavior using `stickyModalHeader()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('updateAuthor')
    ->schema([
        // ...
    ])
    ->action(function (array $data): void {
        // ...
    })
    ->stickyModalHeader()
```

### Making the modal footer sticky

The footer of a modal is rendered inline after the content by default. Slide-overs, however, have a sticky footer that always shows when scrolling the content. You may enable this for a modal too using `stickyModalFooter()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('updateAuthor')
    ->schema([
        // ...
    ])
    ->action(function (array $data): void {
        // ...
    })
    ->stickyModalFooter()
```

<AutoScreenshot name="actions/modal/sticky-header" alt="Modal with sticky header and footer" version="5.x" />

### Custom modal content

You may define custom content to be rendered inside your modal, which you can specify by passing a Blade view into the `modalContent()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Filament\Actions\Action;

Action::make('advance')
    ->action(fn (Post $record) => $record->advance())
    ->modalContent(view('filament.pages.actions.advance'))
```

<UtilityInjection set="actions" version="5.x">The `modalContent()` method also accepts a function to dynamically calculate the value. You can inject various utilities into the function as parameters.</UtilityInjection>

#### Passing data to the custom modal content

You can pass data to the view by returning it from a function. For example, if the `$record` of an action is set, you can pass that through to the view:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Illuminate\Contracts\View\View;

Action::make('advance')
    ->action(fn (Contract $record) => $record->advance())
    ->modalContent(fn (Contract $record): View => view(
        'filament.pages.actions.advance',
        ['record' => $record],
    ))
```

#### Adding custom modal content below the form

By default, the custom content is displayed above the modal form if there is one, but you can add content below using `modalContentFooter()` if you wish:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Filament\Actions\Action;

Action::make('advance')
    ->action(fn (Post $record) => $record->advance())
    ->modalContentFooter(view('filament.pages.actions.advance'))
```

<UtilityInjection set="actions" version="5.x">The `modalContentFooter()` method also accepts a function to dynamically calculate the value. You can inject various utilities into the function as parameters.</UtilityInjection>

#### Adding an action to custom modal content

You can add an action button to your custom modal content, which is useful if you want to add a button that performs an action other than the main action. You can do this by registering an action with the `registerModalActions()` method, and then passing it to the view:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Filament\Actions\Action;
use Illuminate\Contracts\View\View;

Action::make('advance')
    ->registerModalActions([
        Action::make('report')
            ->requiresConfirmation()
            ->action(fn (Post $record) => $record->report()),
    ])
    ->action(fn (Post $record) => $record->advance())
    ->modalContent(fn (Action $action): View => view(
        'filament.pages.actions.advance',
        ['action' => $action],
    ))
```

Now, in the view file, you can render the action button by calling `getModalAction()`:

```blade theme={"theme":"gruvbox-dark-hard"}
<div>
    {{ $action->getModalAction('report') }}
</div>
```

## Using a slide-over instead of a modal

You can open a "slide-over" dialog instead of a modal by using the `slideOver()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('updateAuthor')
    ->schema([
        // ...
    ])
    ->action(function (array $data): void {
        // ...
    })
    ->slideOver()
```

<AutoScreenshot name="actions/modal/slide-over" alt="Slide over with form" version="5.x" />

Instead of opening in the center of the screen, the modal content will now slide in from the right and consume the entire height of the browser.

### Changing the slide-over position

By default, slide-overs enter from the end of the screen (the right side in left-to-right languages, the left side in right-to-left languages). You may change this to the start of the screen by passing `SlideOverPosition::Start` to the `slideOverPosition()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Support\Enums\SlideOverPosition;

Action::make('updateAuthor')
    ->schema([
        // ...
    ])
    ->action(function (array $data): void {
        // ...
    })
    ->slideOver()
    ->slideOverPosition(SlideOverPosition::Start)
```

<AutoScreenshot name="actions/modal/slide-over-start" alt="Slide over from the start of the screen" version="5.x" />

This is useful when the action trigger sits near the start of the viewport — for example, a row action at the beginning of a table row — so the slide-over opens adjacent to its trigger instead of across the screen.

## Changing the modal width

You can change the width of the modal by using the `modalWidth()` method. Options correspond to [Tailwind's max-width scale](https://tailwindcss.com/docs/max-width). The options are `ExtraSmall`, `Small`, `Medium`, `Large`, `ExtraLarge`, `TwoExtraLarge`, `ThreeExtraLarge`, `FourExtraLarge`, `FiveExtraLarge`, `SixExtraLarge`, `SevenExtraLarge`, and `Screen`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Support\Enums\Width;

Action::make('updateAuthor')
    ->schema([
        // ...
    ])
    ->action(function (array $data): void {
        // ...
    })
    ->modalWidth(Width::FiveExtraLarge)
```

<UtilityInjection set="actions" version="5.x">The `modalWidth()` method also accepts a function to dynamically calculate the value. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="actions/modal/wide" alt="Modal with custom width" version="5.x" />

## Executing code when the modal opens

You may execute code within a closure when the modal opens, by passing it to the `mountUsing()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Schemas\Schema;

Action::make('create')
    ->mountUsing(function (Schema $form) {
        $form->fill();

        // ...
    })
```

> The `mountUsing()` method, by default, is used by Filament to initialize the [form](#rendering-a-form-in-a-modal). If you override this method, you will need to call `$form->fill()` to ensure the form is initialized correctly. If you wish to populate the form with data, you can do so by passing an array to the `fill()` method, instead of [using `fillForm()` on the action itself](#filling-the-form-with-existing-data).

## Customizing the action buttons in the footer of the modal

By default, there are two actions in the footer of a modal. The first is a button to submit, which executes the `action()`. The second button closes the modal and cancels the action.

### Modifying the default modal footer action button

To modify the action instance that is used to render one of the default action buttons, you may pass a closure to the `modalSubmitAction()` and `modalCancelAction()` methods:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('help')
    ->modalContent(view('actions.help'))
    ->modalCancelAction(fn (Action $action) => $action->label('Close'))
```

The [methods available to customize trigger buttons](./overview) will work to modify the `$action` instance inside the closure.

<Tip>
  To customize the button labels in your modal, the `modalSubmitActionLabel()` and `modalCancelActionLabel()` methods can be used instead of passing a function to `modalSubmitAction()` and `modalCancelAction()`, if you don't require any further customizations.
</Tip>

### Removing a default modal footer action button

To remove a default action, you may pass `false` to either `modalSubmitAction()` or `modalCancelAction()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('help')
    ->modalContent(view('actions.help'))
    ->modalSubmitAction(false)
```

### Adding an extra modal action button to the footer

You may pass an array of extra actions to be rendered, between the default actions, in the footer of the modal using the `extraModalFooterActions()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('create')
    ->schema([
        // ...
    ])
    // ...
    ->extraModalFooterActions(fn (Action $action): array => [
        $action->makeModalSubmitAction('createAnother', arguments: ['another' => true]),
    ])
```

<UtilityInjection set="actions" version="5.x">The `extraModalFooterActions()` method also accepts a function to dynamically calculate the value. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="actions/modal/extra-footer-actions" alt="Modal with extra footer action buttons" version="5.x" />

`$action->makeModalSubmitAction()` returns an action instance that can be customized using the [methods available to customize trigger buttons](./overview).

The second parameter of `makeModalSubmitAction()` allows you to pass an array of arguments that will be accessible inside the action's `action()` closure as `$arguments`. These could be useful as flags to indicate that the action should behave differently based on the user's decision:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('create')
    ->schema([
        // ...
    ])
    // ...
    ->extraModalFooterActions(fn (Action $action): array => [
        $action->makeModalSubmitAction('createAnother', arguments: ['another' => true]),
    ])
    ->action(function (array $data, array $arguments): void {
        // Create

        if ($arguments['another'] ?? false) {
            // Reset the form and don't close the modal
        }
    })
```

#### Opening another modal from an extra footer action

You can nest actions within each other, allowing you to open a new modal from an extra footer action:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('edit')
    // ...
    ->extraModalFooterActions([
        Action::make('delete')
            ->requiresConfirmation()
            ->action(function () {
                // ...
            }),
    ])
```

Now, the edit modal will have a "Delete" button in the footer, which will open a confirmation modal when clicked. This action is completely independent of the `edit` action, and will not run the `edit` action when it is clicked.

In this example though, you probably want to cancel the `edit` action if the `delete` action is run. You can do this using the `cancelParentActions()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('delete')
    ->requiresConfirmation()
    ->action(function () {
        // ...
    })
    ->cancelParentActions()
```

If you have deep nesting with multiple parent actions, but you don't want to cancel all of them, you can pass the name of the parent action you want to cancel, including its children, to `cancelParentActions()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('first')
    ->requiresConfirmation()
    ->action(function () {
        // ...
    })
    ->extraModalFooterActions([
        Action::make('second')
            ->requiresConfirmation()
            ->action(function () {
                // ...
            })
            ->extraModalFooterActions([
                Action::make('third')
                    ->requiresConfirmation()
                    ->action(function () {
                        // ...
                    })
                    ->extraModalFooterActions([
                        Action::make('fourth')
                            ->requiresConfirmation()
                            ->action(function () {
                                // ...
                            })
                            ->cancelParentActions('second'),
                    ]),
            ]),
    ])
```

In this example, if the `fourth` action is run, the `second` action is canceled, but so is the `third` action since it is a child of `second`. The `first` action is not canceled, however, since it is the parent of `second`. The `first` action's modal will remain open.

## Accessing information about parent actions from a child

You can access the instances of parent actions and their raw data and arguments by injecting the `$mountedActions` array in a function used by your nested action. For example, to get the top-most parent action currently active on the page, you can use `$mountedActions[0]`. From there, you can get the raw data for that action by calling `$mountedActions[0]->getRawData()`. Please be aware that raw data is not validated since the action has not been submitted yet:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;

Action::make('first')
    ->schema([
        TextInput::make('foo'),
    ])
    ->action(function () {
        // ...
    })
    ->extraModalFooterActions([
        Action::make('second')
            ->requiresConfirmation()
            ->action(function (array $mountedActions) {
                dd($mountedActions[0]->getRawData());
            
                // ...
            }),
    ])
```

You can do similar with the current arguments for a parent action, with the `$mountedActions[0]->getArguments()` method.

Even if you have multiple layers of nesting, the `$mountedActions` array will contain every action that is currently active, so you can access information about them:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('first')
    ->schema([
        TextInput::make('foo'),
    ])
    ->action(function () {
        // ...
    })
    ->extraModalFooterActions([
        Action::make('second')
            ->schema([
                TextInput::make('bar'),
            ])
            ->arguments(['number' => 2])
            ->action(function () {
                // ...
            })
            ->extraModalFooterActions([
                Action::make('third')
                    ->schema([
                        TextInput::make('baz'),
                    ])
                    ->arguments(['number' => 3])
                    ->action(function () {
                        // ...
                    })
                    ->extraModalFooterActions([
                        Action::make('fourth')
                            ->requiresConfirmation()
                            ->action(function (array $mountedActions) {
                                dd(
                                    $mountedActions[0]->getRawData(),
                                    $mountedActions[0]->getArguments(),
                                    $mountedActions[1]->getRawData(),
                                    $mountedActions[1]->getArguments(),
                                    $mountedActions[2]->getRawData(),
                                    $mountedActions[2]->getArguments(),
                                );
                                // ...
                            }),
                    ]),
            ]),
    ])
```

## Closing the modal

### Closing the modal by clicking away

By default, when you click away from a modal, it will close itself. If you wish to disable this behavior for a specific action, you can use the `closeModalByClickingAway(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('updateAuthor')
    ->schema([
        // ...
    ])
    ->action(function (array $data): void {
        // ...
    })
    ->closeModalByClickingAway(false)
```

<UtilityInjection set="actions" version="5.x">The `closeModalByClickingAway()` method also accepts a function to dynamically calculate the value. You can inject various utilities into the function as parameters.</UtilityInjection>

If you'd like to change the behavior for all modals in the application, you can do so by calling `ModalComponent::closedByClickingAway()` inside a service provider or middleware:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\View\Components\ModalComponent;

ModalComponent::closedByClickingAway(false);
```

### Closing the modal by escaping

By default, when you press escape on a modal, it will close itself. If you wish to disable this behavior for a specific action, you can use the `closeModalByEscaping(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('updateAuthor')
    ->schema([
        // ...
    ])
    ->action(function (array $data): void {
        // ...
    })
    ->closeModalByEscaping(false)
```

<UtilityInjection set="actions" version="5.x">The `closeModalByEscaping()` method also accepts a function to dynamically calculate the value. You can inject various utilities into the function as parameters.</UtilityInjection>

If you'd like to change the behavior for all modals in the application, you can do so by calling `ModalComponent::closedByEscaping()` inside a service provider or middleware:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\View\Components\ModalComponent;

ModalComponent::closedByEscaping(false);
```

### Hiding the modal close button

By default, modals have a close button in the top right corner. If you wish to hide the close button, you can use the `modalCloseButton(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('updateAuthor')
    ->schema([
        // ...
    ])
    ->action(function (array $data): void {
        // ...
    })
    ->modalCloseButton(false)
```

<UtilityInjection set="actions" version="5.x">The `modalCloseButton()` method also accepts a function to dynamically calculate the value. You can inject various utilities into the function as parameters.</UtilityInjection>

If you'd like to hide the close button for all modals in the application, you can do so by calling `ModalComponent::closeButton(false)` inside a service provider or middleware:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\View\Components\ModalComponent;

ModalComponent::closeButton(false);
```

<AutoScreenshot name="actions/modal/no-close-button" alt="Modal without a close button" version="5.x" />

## Preventing the modal from autofocusing

By default, modals will autofocus on the first focusable element when opened. If you wish to disable this behavior, you can use the `modalAutofocus(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('updateAuthor')
    ->schema([
        // ...
    ])
    ->action(function (array $data): void {
        // ...
    })
    ->modalAutofocus(false)
```

<UtilityInjection set="actions" version="5.x">The `modalAutofocus()` method also accepts a function to dynamically calculate the value. You can inject various utilities into the function as parameters.</UtilityInjection>

If you'd like to disable autofocus for all modals in the application, you can do so by calling `ModalComponent::autofocus(false)` inside a service provider or middleware:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\View\Components\ModalComponent;

ModalComponent::autofocus(false);
```

## Overlaying child action modals on top of parent action modals

By default, when a child action opens its modal, the parent action's modal is temporarily closed and then reopened after the child action is dismissed. If you'd like the child action's modal to instead appear on top of the parent action's modal (keeping the parent visible underneath), you can use the `overlayParentActions()` method on the child action:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Schemas\Components\Repeater;

Action::make('editItems')
    ->slideOver()
    ->schema([
        Repeater::make('items')
            ->schema([
                // ...
            ])
            ->deleteAction(
                fn (Action $action) => $action
                    ->requiresConfirmation()
                    ->overlayParentActions(),
            ),
    ])
    ->action(function () {
        // ...
    })
```

In this example, when the user clicks the delete button on a repeater item, the confirmation dialog appears on top of the slide-over instead of the slide-over closing first. This creates a smoother experience, especially for actions inside slide-overs or complex forms where closing and reopening the parent would be disorienting.

<AutoScreenshot name="actions/modal/overlaying-child" alt="Child confirmation modal overlaying a parent slide-over" version="5.x" />

## Optimizing modal configuration methods

When you use database queries or other heavy operations inside modal configuration methods like `modalHeading()`, they can be executed more than once. This is because Filament uses these methods to decide whether to render the modal or not, and also to render the modal's content.

To skip the check that Filament does to decide whether to render the modal, you can use the `modal()` method, which will inform Filament that the modal exists for this action, and it does not need to check again:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('updateAuthor')
    ->modal()
```

## Conditionally hiding the modal

You may have a need to conditionally show a modal for confirmation reasons while falling back to the default action. This can be achieved using `modalHidden()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('create')
    ->action(function (array $data): void {
        // ...
    })
    ->modalHidden($this->role !== 'admin')
    ->modalContent(view('filament.pages.actions.create'))
```

<UtilityInjection set="actions" version="5.x">The `modalHidden()` method also accepts a function to dynamically calculate the value. You can inject various utilities into the function as parameters.</UtilityInjection>

## Adding extra attributes to the modal window

You can pass extra HTML attributes to the modal window via the `extraModalWindowAttributes()` method, which will be merged onto its outer HTML element. The attributes should be represented by an array, where the key is the attribute name and the value is the attribute value:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('updateAuthor')
    ->extraModalWindowAttributes(['class' => 'update-author-modal'])
```

<UtilityInjection set="actions" version="5.x">As well as allowing a static value, the `extraModalWindowAttributes()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<Tip>
  By default, calling `extraModalWindowAttributes()` multiple times will overwrite the previous attributes. If you wish to merge the attributes instead, you can pass `merge: true` to the method.
</Tip>

## Adding extra attributes to the modal overlay

You can pass extra HTML attributes to the modal overlay via the `extraModalOverlayAttributes()`. The attributes should be represented by an array, where the key is the attribute name and the value is the attribute value:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('updateAuthor')
    ->extraModalOverlayAttributes(['class' => 'update-author-overlay'])
```

<UtilityInjection set="actions" version="5.x">As well as allowing a static value, the `extraModalOverlayAttributes()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<Tip>
  By default, calling `extraModalOverlayAttributes()` multiple times will overwrite the previous attributes. If you wish to merge the attributes instead, you can pass <code>merge: true</code> to the method.
</Tip>

<EditOnGitHub version="5.x" path="packages/actions/docs/02-modals.md" />

<Footer />
