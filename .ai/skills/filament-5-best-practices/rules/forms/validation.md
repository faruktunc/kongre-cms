> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Validation

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

Validation rules may be added to any [field](./overview#available-fields).

In Laravel, validation rules are usually defined in arrays like `['required', 'max:255']` or a combined string like `required|max:255`. This is fine if you're exclusively working in the backend with simple form requests. But Filament is also able to give your users frontend validation, so they can fix their mistakes before any backend requests are made.

Filament includes many [dedicated validation methods](#available-rules), but you can also use any [other Laravel validation rules](#other-rules), including [custom validation rules](#custom-rules).

<AutoScreenshot name="forms/validation" alt="A form with validation errors" version="5.x" />

<Warning>
  Some default Laravel validation rules rely on the correct attribute names and won't work when passed via `rule()`/`rules()`. Use the dedicated validation methods whenever you can.
</Warning>

## Available rules

### Active URL

The field must have a valid A or AAAA record according to the `dns_get_record()` PHP function. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-active-url)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->activeUrl()
```

### After (date)

The field value must be a value after a given date. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-after)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('start_date')->after('tomorrow')
```

Alternatively, you may pass the name of another field to compare against:

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('start_date')
Field::make('end_date')->after('start_date')
```

### After or equal to (date)

The field value must be a date after or equal to the given date. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-after-or-equal)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('start_date')->afterOrEqual('tomorrow')
```

Alternatively, you may pass the name of another field to compare against:

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('start_date')
Field::make('end_date')->afterOrEqual('start_date')
```

### Alpha

The field must be entirely alphabetic characters. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-alpha)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->alpha()
```

### Alpha Dash

The field may have alphanumeric characters, as well as dashes and underscores. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-alpha-dash)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->alphaDash()
```

### Alpha Numeric

The field must be entirely alphanumeric characters. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-alpha-num)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->alphaNum()
```

### ASCII

The field must be entirely 7-bit ASCII characters. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-ascii)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->ascii()
```

### Before (date)

The field value must be a date before a given date. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-before)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('start_date')->before('first day of next month')
```

Alternatively, you may pass the name of another field to compare against:

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('start_date')->before('end_date')
Field::make('end_date')
```

### Before or equal to (date)

The field value must be a date before or equal to the given date. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-before-or-equal)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('start_date')->beforeOrEqual('end of this month')
```

Alternatively, you may pass the name of another field to compare against:

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('start_date')->beforeOrEqual('end_date')
Field::make('end_date')
```

### Confirmed

The field must have a matching field of `{field}_confirmation`. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-confirmed)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('password')->confirmed()
Field::make('password_confirmation')
```

### Different

The field value must be different to another. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-different)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('backup_email')->different('email')
```

### Doesn't Start With

The field must not start with one of the given values. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-doesnt-start-with)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->doesntStartWith(['admin'])
```

### Doesn't End With

The field must not end with one of the given values. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-doesnt-end-with)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->doesntEndWith(['admin'])
```

### Ends With

The field must end with one of the given values. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-ends-with)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->endsWith(['bot'])
```

### Enum

The field must contain a valid enum value. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-enum)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('status')->enum(MyStatus::class)
```

### Exists

The field value must exist in the database. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-exists)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('invitation')->exists()
```

By default, the form's model will be searched, [if it is registered](../components/form#setting-a-form-model). You may specify a custom table name or model to search:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Invitation;

Field::make('invitation')->exists(table: Invitation::class)
```

By default, the field name will be used as the column to search. You may specify a custom column to search:

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('invitation')->exists(column: 'id')
```

You can further customize the rule by passing a [closure](./overview#closure-customization) to the `modifyRuleUsing` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Validation\Rules\Exists;

Field::make('invitation')
    ->exists(modifyRuleUsing: function (Exists $rule) {
        return $rule->where('is_active', 1);
    })
```

Laravel's `exists` validation rule does not use the Eloquent model to query the database by default, so it will not use any global scopes defined on the model, including for soft-deletes. As such, even if there is a soft-deleted record with the same value, the validation will pass.

Since global scopes are not applied, Filament's multi-tenancy feature also does not scope the query to the current tenant by default.

To do this, you should use the `scopedExists()` method instead, which replaces Laravel's `exists` implementation with one that uses the model to query the database, applying any global scopes defined on the model, including for soft-deletes and multi-tenancy:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('email')
    ->scopedExists()
```

If you would like to modify the Eloquent query used to check for presence, including to remove a global scope, you can pass a function to the `modifyQueryUsing` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

TextInput::make('email')
    ->scopedExists(modifyQueryUsing: function (Builder $query) {
        return $query->withoutGlobalScope(SoftDeletingScope::class);
    })
```

### Filled

The field must not be empty when it is present. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-filled)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->filled()
```

### Greater than

The field value must be greater than another. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-gt)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('newNumber')->gt('oldNumber')
```

### Greater than or equal to

The field value must be greater than or equal to another. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-gte)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('newNumber')->gte('oldNumber')
```

### Hex color

The field value must be a valid color in hexadecimal format. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-hex-color)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('color')->hexColor()
```

### In

The field must be included in the given list of values. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-in)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('status')->in(['pending', 'completed'])
```

The [toggle buttons](./toggle-buttons), [checkbox list](./checkbox-list), [radio](./radio) and [select](./select#valid-options-validation-in-rule) fields automatically apply the `in()` rule based on their available options, so you do not need to add it manually.

### Ip Address

The field must be an IP address. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-ip)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('ip_address')->ip()
Field::make('ip_address')->ipv4()
Field::make('ip_address')->ipv6()
```

### JSON

The field must be a valid JSON string. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-json)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('ip_address')->json()
```

### Less than

The field value must be less than another. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-lt)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('newNumber')->lt('oldNumber')
```

### Less than or equal to

The field value must be less than or equal to another. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-lte)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('newNumber')->lte('oldNumber')
```

### Mac Address

The field must be a MAC address. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-mac)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('mac_address')->macAddress()
```

### Multiple Of

The field must be a multiple of value. [See the Laravel documentation.](https://laravel.com/docs/validation#multiple-of)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('number')->multipleOf(2)
```

### Not In

The field must not be included in the given list of values. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-not-in)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('status')->notIn(['cancelled', 'rejected'])
```

### Not Regex

The field must not match the given regular expression. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-not-regex)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('email')->notRegex('/^.+$/i')
```

### Nullable

The field value can be empty. This rule is applied by default if the `required` rule is not present. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-nullable)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->nullable()
```

### Prohibited

The field value must be empty. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-prohibited)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->prohibited()
```

### Prohibited If

The field must be empty *only if* the other specified field has any of the given values. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-prohibited-if)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->prohibitedIf('field', 'value')
```

### Prohibited Unless

The field must be empty *unless* the other specified field has any of the given values. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-prohibited-unless)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->prohibitedUnless('field', 'value')
```

### Prohibits

If the field is not empty, all other specified fields must be empty. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-prohibits)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->prohibits('field')

Field::make('name')->prohibits(['field', 'another_field'])
```

### Required

The field value must not be empty. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-required)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->required()
```

#### Marking a field as required

By default, required fields will show an asterisk `*` next to their label. You may want to hide the asterisk on forms where all fields are required, or where it makes sense to add a [hint](#adding-a-hint-next-to-the-label) to optional fields instead:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->required() // Adds validation to ensure the field is required
    ->markAsRequired(false) // Removes the asterisk
```

If your field is not `required()`, but you still wish to show an asterisk `*` you can use `markAsRequired()` too:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->markAsRequired()
```

### Required If

The field value must not be empty *only if* the other specified field has any of the given values. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-required-if)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->requiredIf('field', 'value')
```

### Required If Accepted

The field value must not be empty *only if* the other specified field is equal to "yes", "on", 1, "1", true, or "true". [See the Laravel documentation.](https://laravel.com/docs/validation#rule-required-if-accepted)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->requiredIfAccepted('field')
```

### Required Unless

The field value must not be empty *unless* the other specified field has any of the given values. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-required-unless)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->requiredUnless('field', 'value')
```

### Required With

The field value must not be empty *only if* any of the other specified fields are not empty. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-required-with)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->requiredWith('field,another_field')
```

### Required With All

The field value must not be empty *only if* all the other specified fields are not empty. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-required-with-all)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->requiredWithAll('field,another_field')
```

### Required Without

The field value must not be empty *only when* any of the other specified fields are empty. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-required-without)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->requiredWithout('field,another_field')
```

### Required Without All

The field value must not be empty *only when* all the other specified fields are empty. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-required-without-all)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->requiredWithoutAll('field,another_field')
```

### Regex

The field must match the given regular expression. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-regex)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('email')->regex('/^.+@.+$/i')
```

### Same

The field value must be the same as another. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-same)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('password')->same('passwordConfirmation')
```

### Starts With

The field must start with one of the given values. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-starts-with)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->startsWith(['a'])
```

### String

The field must be a string. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-string)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('name')->string()
```

### Unique

The field value must not exist in the database. [See the Laravel documentation.](https://laravel.com/docs/validation#rule-unique)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('email')->unique()
```

If your Filament form already has an Eloquent model associated with it, such as in a [panel resource](../resources), Filament will use that. You may also specify a custom table name or model to search:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\User;

Field::make('email')->unique(table: User::class)
```

By default, the field name will be used as the column to search. You may specify a custom column to search:

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('email')->unique(column: 'email_address')
```

Usually, you wish to ignore a given model during unique validation. For example, consider an "update profile" form that includes the user's name, email address, and location. You will probably want to verify that the email address is unique. However, if the user only changes the name field and not the email field, you do not want a validation error to be thrown because the user is already the owner of the email address in question. If your Filament form already has an Eloquent model associated with it, such as in a [panel resource](../resources), Filament will ignore it.

To prevent Filament from ignoring the current Eloquent record, you can pass `false` to the `ignoreRecord` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('email')->unique(ignoreRecord: false)
```

Alternatively, to ignore an Eloquent record of your choice, you can pass it to the `ignorable` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('email')->unique(ignorable: $ignoredUser)
```

You can further customize the rule by passing a [closure](./overview#closure-customization) to the `modifyRuleUsing` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Validation\Rules\Unique;

Field::make('email')
    ->unique(modifyRuleUsing: function (Unique $rule) {
        return $rule->where('is_active', 1);
    })
```

Laravel's `unique` validation rule does not use the Eloquent model to query the database by default, so it will not use any global scopes defined on the model, including for soft-deletes. As such, even if there is a soft-deleted record with the same value, the validation will fail.

Since global scopes are not applied, Filament's multi-tenancy feature also does not scope the query to the current tenant by default.

To do this, you should use the `scopedUnique()` method instead, which replaces Laravel's `unique` implementation with one that uses the model to query the database, applying any global scopes defined on the model, including for soft-deletes and multi-tenancy:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('email')
    ->scopedUnique()
```

If you would like to modify the Eloquent query used to check for uniqueness, including to remove a global scope, you can pass a function to the `modifyQueryUsing` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

TextInput::make('email')
    ->scopedUnique(modifyQueryUsing: function (Builder $query) {
        return $query->withoutGlobalScope(SoftDeletingScope::class);
    })
```

### ULID

The field under validation must be a valid [Universally Unique Lexicographically Sortable Identifier](https://github.com/ulid/spec) (ULID). [See the Laravel documentation.](https://laravel.com/docs/validation#rule-ulid)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('identifier')->ulid()
```

### UUID

The field must be a valid RFC 4122 (version 1, 3, 4, or 5) universally unique identifier (UUID). [See the Laravel documentation.](https://laravel.com/docs/validation#rule-uuid)

```php theme={"theme":"gruvbox-dark-hard"}
Field::make('identifier')->uuid()
```

## Other rules

You may add other validation rules to any field using the `rules()` method:

```php theme={"theme":"gruvbox-dark-hard"}
TextInput::make('slug')->rules(['alpha_dash'])
```

A full list of validation rules may be found in the [Laravel documentation](https://laravel.com/docs/validation#available-validation-rules).

## Custom rules

You may use any custom validation rules as you would do in [Laravel](https://laravel.com/docs/validation#custom-validation-rules):

```php theme={"theme":"gruvbox-dark-hard"}
TextInput::make('slug')->rules([new Uppercase()])
```

You may also use [closure rules](https://laravel.com/docs/validation#using-closures):

```php theme={"theme":"gruvbox-dark-hard"}
use Closure;

TextInput::make('slug')->rules([
    fn (): Closure => function (string $attribute, $value, Closure $fail) {
        if ($value === 'foo') {
            $fail('The :attribute is invalid.');
        }
    },
])
```

You may [inject utilities](./overview#field-utility-injection) like [`$get`](./overview#injecting-the-state-of-another-field) into your custom rules, for example if you need to reference other field values in your form. To do this, wrap the closure rule in another function that returns it:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Utilities\Get;

TextInput::make('slug')->rules([
    fn (Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
        if ($get('other_field') === 'foo' && $value !== 'bar') {
            $fail("The {$attribute} is invalid.");
        }
    },
])
```

## Customizing validation attributes

When fields fail validation, their label is used in the error message. To customize the label used in field error messages, use the `validationAttribute()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->validationAttribute('full name')
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `validationAttribute()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Validation messages

By default Laravel's validation error message is used. To customize the error messages, use the `validationMessages()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('email')
    ->unique(// ...)
    ->validationMessages([
        'unique' => 'The :attribute has already been registered.',
    ])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing an array of static value, the `validationMessages()` method also accepts a function for each message. You can inject various utilities into the functions as parameters.</UtilityInjection>

### Allowing HTML in validation messages

By default, validation messages are rendered as plain text to prevent XSS attacks. However, you may need to render HTML in your validation messages, such as when displaying lists or links. To enable HTML rendering for validation messages, use the `allowHtmlValidationMessages()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('password')
    ->required()
    ->rules([
        new CustomRule(), // Custom rule that returns a validation message that contains HTML
    ])
    ->allowHtmlValidationMessages()
```

Be aware that you will need to ensure that the HTML in all validation messages is safe to render, otherwise your application will be vulnerable to XSS attacks.

## Disabling validation when fields are not saved

When a field is [not saved](./overview#preventing-a-field-from-being-saved), it is still validated. To disable validation for fields that are not saved, use the `validatedWhenNotDehydrated()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('name')
    ->required()
    ->saved(false)
    ->validatedWhenNotDehydrated(false)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `validatedWhenNotDehydrated()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<EditOnGitHub version="5.x" path="packages/forms/docs/23-validation.md" />

<Footer />
